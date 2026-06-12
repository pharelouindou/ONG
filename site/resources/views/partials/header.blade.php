<header class="header" id="header">
    <nav class="nav container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset(config('site.images.logo')) }}" alt="ADéProG-ONG" class="logo-img" />
            <span class="logo-text">ADéProG<span class="logo-sub">ONG</span></span>
        </a>
        <button class="nav-toggle" id="navToggle" aria-label="Menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
        <ul class="nav-links" id="navLinks">
            <li><a href="{{ route('home') }}"       @class(['active' => request()->routeIs('home')])>Accueil</a></li>
            <li><a href="{{ route('about') }}"      @class(['active' => request()->routeIs('about')])>À propos</a></li>
            <li><a href="{{ route('actions') }}"    @class(['active' => request()->routeIs('actions', 'project.detail')])>Actions</a></li>
            <li><a href="{{ route('partners') }}"   @class(['active' => request()->routeIs('partners')])>Partenaires</a></li>
            <li><a href="{{ route('contact') }}"    @class(['active' => request()->routeIs('contact')])>Contact</a></li>
        </ul>
    </nav>
</header>
