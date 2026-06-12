<footer class="footer">
    <div class="container footer-inner">
        <div class="footer-brand">
            <img src="{{ asset(config('site.images.logo')) }}" alt="ADéProG-ONG" class="logo-img sm" />
            <div>
                <strong>ADéProG-ONG</strong>
                <p>Association pour le Développement Durable et la Promotion du Genre</p>
            </div>
        </div>
        <nav class="footer-nav">
            <a href="{{ route('about') }}">À propos</a>
            <a href="{{ route('actions') }}">Actions</a>
            <a href="{{ route('partners') }}">Partenaires</a>
            <a href="{{ route('contact') }}">Contact</a>
        </nav>
        <p class="footer-copy">&copy; {{ date('Y') }} ADéProG-ONG. Tous droits réservés.</p>
    </div>
</footer>
