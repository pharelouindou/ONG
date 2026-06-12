@extends('layouts.app')

@section('title', 'ADéProG-ONG | Développement Durable & Promotion du Genre')

@section('content')
<section class="hero hero-photo" style="--hero-image: url('{{ asset(config('site.images.hero')) }}')">
    <div class="hero-bg"></div>
    <div class="container hero-content">
        <p class="hero-badge">ONG · Borgou, Bénin · Depuis 2022</p>
        <h1>Construire un avenir durable,<br /><em>ensemble</em></h1>
        <p class="hero-lead">
            Association pour le Développement Durable et la Promotion du Genre —
            {{ config('site.slogan') }}.
        </p>
        <div class="hero-actions">
            <a href="{{ route('actions') }}" class="btn btn-primary">Nos actions</a>
            <a href="{{ route('contact') }}" class="btn btn-outline">Nous contacter</a>
        </div>
        <div class="hero-stats">
            <div class="stat">
                <strong>14</strong>
                <span>Membres actifs</span>
            </div>
            <div class="stat">
                <strong>2</strong>
                <span>Zones sanitaires</span>
            </div>
            <div class="stat">
                <strong>3</strong>
                <span>Domaines d'action</span>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="split-feature">
            <div class="split-feature-image">
                <img src="{{ asset('images/activites/groupe-beneficiaires.jpg') }}" alt="Bénéficiaires des programmes ADéProG à Nikki" />
            </div>
            <div class="split-feature-text">
                <span class="section-tag">Notre engagement</span>
                <h2>Une ONG ancrée dans les communautés</h2>
                <p>
                    ADéProG intervient dans le département du Borgou pour contribuer à la réduction de la pauvreté,
                    de la faim et des inégalités, en s'appuyant sur une approche participative et orientée résultats.
                </p>
                <p>
                    S'engageant pour l'atteinte des Objectifs de Développement Durable (ODD) dans la commune de Nikki
                    et ses environs.
                </p>
                <a href="{{ route('about') }}" class="btn btn-primary">Découvrir notre organisation</a>
            </div>
        </div>

        <div class="domains-grid">
            <div class="domain-item">
                <span class="domain-num">01</span>
                <h4>Nutrition & Sécurité alimentaire</h4>
                <p>Dépistage, sensibilisation ANJE et pépinières de moringa.</p>
            </div>
            <div class="domain-item">
                <span class="domain-num">02</span>
                <h4>Santé communautaire</h4>
                <p>SSR, droits connexes, VBG et soins complets d'avortement.</p>
            </div>
            <div class="domain-item">
                <span class="domain-num">03</span>
                <h4>Agroécologie</h4>
                <p>Résilience des petits exploitants face aux chocs climatiques.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Impact</span>
            <h2>Nos dernières réalisations</h2>
        </div>
        <div class="photo-cards-grid">
            <article class="photo-card">
                <div class="photo-card-image">
                    <img src="{{ asset('images/activites/depistage-malnutrition.jpg') }}" alt="Dépistage malnutrition" loading="lazy" />
                </div>
                <div class="photo-card-body">
                    <div class="project-tag">2025</div>
                    <h3>730 enfants dépistés</h3>
                    <p>Activités de nutrition à Nikki et Sinendé : dépistage, sensibilisation et démonstrations culinaires.</p>
                    <a href="{{ route('actions') }}" class="link-arrow">Voir toutes nos actions →</a>
                </div>
            </article>
            <article class="photo-card">
                <div class="photo-card-image">
                    <img src="{{ asset('images/activites/srhr-causerie.jpg') }}" alt="Causerie SRHR" loading="lazy" />
                </div>
                <div class="photo-card-body">
                    <div class="project-tag">2025</div>
                    <h3>2 321 personnes sensibilisées</h3>
                    <p>Causeries éducatives sur la santé sexuelle et reproductive dans la zone sanitaire NKP.</p>
                    <a href="{{ route('actions') }}#actualites" class="link-arrow">Lire les actualités →</a>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Sur le terrain</span>
            <h2>Galerie photos</h2>
        </div>
        @include('partials.gallery')
    </div>
</section>
@endsection
