<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

/**
 * Controller responsável pelo fluxo OAuth2 via Laravel Socialite.
 *
 * Suporta: Google, Facebook
 *
 * Fluxo:
 *   1. Cliente clica "Entrar com Google" → redirectToProvider()
 *   2. Google autentica e redireciona para → handleProviderCallback()
 *   3. Usuário é criado/atualizado no banco e logado automaticamente
 */
class SocialiteController extends Controller
{
    /**
     * Redireciona o cliente para a página de OAuth do provedor.
     *
     * @param  string $provider  'google' ou 'facebook'
     */
    public function redirectToProvider(string $provider)
    {
        $this->validateProvider($provider);

        // stateless() evita o InvalidStateException causado por
        // incompatibilidade de sessão entre redirect e callback
        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Recebe o callback do provedor OAuth e autentica o cliente.
     *
     * @param  string $provider  'google' ou 'facebook'
     */
    public function handleProviderCallback(string $provider)
    {
        $this->validateProvider($provider);

        try {
            // setHttpClient(['verify' => false]) bypassa erro de SSL local do cURL no Windows
            $socialUser = Socialite::driver($provider)
                ->stateless()
                ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
                ->user();
        } catch (\Exception $e) {
            \Log::error('OAuth callback error: ' . $e->getMessage());
            return redirect()->route('autorizacao.login')
                ->with('mensagem', 'Não foi possível autenticar com ' . ucfirst($provider) . '. Tente novamente.');
        }

        // 1. Busca por provider_id (conta OAuth já vinculada)
        $user = User::where('provider', $provider)
                    ->where('provider_id', $socialUser->getId())
                    ->first();

        if (! $user) {
            // 2. Busca por e-mail (usuário pode ter conta manual com mesmo e-mail)
            $user = User::where('email', $socialUser->getEmail())->first();

            if ($user) {
                // Vincula a conta OAuth existente ao provedor
                $user->update([
                    'provider'    => $provider,
                    'provider_id' => $socialUser->getId(),
                    'avatar'      => $socialUser->getAvatar(),
                ]);
            } else {
                // 3. Cria um novo cliente com os dados do provedor
                $user = User::create([
                    'name'        => $socialUser->getName() ?? $socialUser->getNickname() ?? 'Usuário',
                    'email'       => $socialUser->getEmail(),
                    'provider'    => $provider,
                    'provider_id' => $socialUser->getId(),
                    'avatar'      => $socialUser->getAvatar(),
                    // Senha aleatória: cliente usa OAuth, não faz login manual
                    'password'    => Str::random(32),
                ]);
            }
        } else {
            // Atualiza o avatar caso tenha mudado
            $user->update(['avatar' => $socialUser->getAvatar()]);
        }

        // Autentica o cliente na sessão (guard 'web')
        Auth::login($user, remember: true);

        return redirect()->intended(route('cardapio.index'))
            ->with('mensagem', 'Bem-vindo, ' . $user->name . '!');
    }

    /**
     * Valida se o provedor informado é suportado.
     */
    private function validateProvider(string $provider): void
    {
        if (! in_array($provider, ['google', 'facebook'])) {
            abort(404, "Provedor OAuth '{$provider}' não suportado.");
        }
    }
}

