<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class BasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dd($request->all());
        if (Auth::loginUsingId($request->input('id')) == true) {
            return redirect()->route('autorizacao.login');
        }
        return $next($request);
    }
}
