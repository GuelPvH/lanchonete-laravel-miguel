<footer class="figma-footer">
    <div class="container-xl figma-shell">
        <div class="row g-4 figma-footer-grid">
            <div class="col-12 col-lg-3">
                <img class="figma-footer-logo" src="{{ asset('img/logo.png') }}" alt="MecDonin">
                <p>Company # 490039-445, Registered with<br>House of companies.</p>
            </div>

            <div class="col-12 col-lg-5">
                <h3>Receba Ofertas Exclusivas na sua Caixa de Entrada</h3>
                <form class="figma-newsletter" action="#cardapio">
                    <input type="email" placeholder="seuemail@gmail.com" aria-label="Email para ofertas">
                    <button type="submit">Inscrever-se</button>
                </form>
                <p>Nós não enviaremos spam, leia nossa política de e-mail</p>
                <div class="figma-social-row" aria-label="Redes sociais">
                    <a href="#" aria-label="Facebook">f</a>
                    <a href="#" aria-label="Instagram">◎</a>
                    <a href="#" aria-label="TikTok">♪</a>
                    <a href="#" aria-label="Snapchat">♧</a>
                </div>
            </div>

            <div class="col-6 col-lg-2">
                <h3>Quem Somos</h3>
                <p>
                    <a href="#informacoes">Privacidade</a><br>
                    <a href="#informacoes">Cookies</a><br>
                    <a href="#avaliacoes">Nossa História</a>
                </p>
            </div>

            <div class="col-6 col-lg-2">
                <h3>Links Importantes</h3>
                <p>
                    <a href="#">Ajuda</a><br>
                    <a href="#">Trabalhe Conosco</a><br>
                    <a href="{{ route('perfil.index') }}">Entra Para Pedir</a><br>
                    <a href="{{ route('register') }}">Criar uma Conta Administrativa</a>
                </p>
            </div>
        </div>
    </div>

    <div class="figma-footer-bottom">
        <div class="container-xl figma-shell">Privacy Policy &nbsp;&nbsp; Terms &nbsp;&nbsp; Pricing</div>
    </div>
</footer>
