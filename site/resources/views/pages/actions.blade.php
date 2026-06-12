@extends('layouts.app')

@section('title', 'Actions & Actualités | ADéProG-ONG')
@section('meta_description', 'Projets de terrain, actualités et agenda des activités de ADéProG-ONG au Borgou.')

@section('content')
@include('partials.page-hero', [
    'heroClass' => 'ph-actions',
    'tag'       => 'Nos engagements',
    'title'     => 'Actions & Actualités',
    'subtitle'  => 'Projets concrets sur le terrain et suivi de nos activités au service des communautés.',
    'icon'      => '🌱',
])

{{-- ── Grille des projets ─────────────────────────────────────────────────── --}}
<section class="section" id="projets">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Projets</span>
            <h2>Nos projets & interventions</h2>
        </div>
        <div class="photo-cards-grid">
            @foreach (config('site.projects') as $project)
                <a href="{{ route('project.detail', \Illuminate\Support\Str::slug($project['title'])) }}"
                   class="photo-card photo-card-link"
                   aria-label="Voir le projet : {{ $project['title'] }}">
                    <div class="photo-card-image">
                        <img src="{{ asset($project['image']) }}"
                             alt="{{ $project['alt'] }}"
                             loading="lazy" />
                        <div class="photo-card-overlay">
                            <span class="photo-card-cta">Voir le détail →</span>
                        </div>
                    </div>
                    <div class="photo-card-body">
                        <div class="project-tag">{{ $project['tag'] }}</div>
                        <h3>{{ $project['title'] }}</h3>
                        @if(!empty($project['zone']))
                            <p class="project-zone">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                                {{ $project['zone'] }}
                            </p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ── Stratégie d'intervention ────────────────────────────────────────────── --}}
<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Méthode</span>
            <h2>Notre stratégie d'intervention</h2>
        </div>
        <div class="split-feature split-feature-reverse">
            <div class="split-feature-image">
                <img src="{{ asset('images/activites/nutrition-sensibilisation.jpg') }}"
                     alt="Sensibilisation communautaire ADéProG" loading="lazy" />
            </div>
            <div class="split-feature-text">
                <p>
                    Les approches d'intervention de l'ONG se fondent sur une dynamique intégrée combinant
                    l'implication active des communautés, l'inclusion et l'équité à travers une approche
                    basée sur les droits humains, la cohérence intersectorielle et une démarche rigoureusement
                    axée sur les résultats.
                </p>
                <ul class="values-list">
                    <li>Identification participative des besoins</li>
                    <li>Co-construction avec les populations</li>
                    <li>Évaluation continue des résultats</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ── Actualités ──────────────────────────────────────────────────────────── --}}
<section class="section" id="actualites">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Veille</span>
            <h2>Actualités & événements</h2>
        </div>
        <div class="news-grid">
            @foreach (config('site.news') as $item)
                <article class="news-card news-card-photo">
                    <div class="news-card-image">
                        <img src="{{ asset($item['image']) }}"
                             alt="{{ $item['title'] }}" loading="lazy" />
                    </div>
                    <div class="news-card-body">
                        <time datetime="{{ $item['date'] }}">{{ $item['label'] }}</time>
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['text'] }}</p>
                    </div>
                </article>
            @endforeach
            <article class="news-card">
                <div class="news-card-body">
                    <time datetime="2026">2026</time>
                    <h3>Recherche de partenariats</h3>
                    <p>
                        ADéProG ouvre ses portes aux bailleurs et investisseurs pour des projets
                        d'impact dans le Nord Bénin.
                        <a href="{{ route('contact') }}">Nous contacter →</a>
                    </p>
                </div>
            </article>
        </div>
    </div>
</section>

{{-- ── Agenda ──────────────────────────────────────────────────────────────── --}}
<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Agenda</span>
            <h2>Événements à venir</h2>
        </div>
        <div class="agenda-list">
            <div class="agenda-item">
                <span class="agenda-date">À planifier</span>
                <div>
                    <h4>Foyers d'Apprentissage Nutritionnelle</h4>
                    <p>Mise en place dans les zones d'intervention NKP.</p>
                </div>
            </div>
            <div class="agenda-item">
                <span class="agenda-date">À planifier</span>
                <div>
                    <h4>Espaces fruitiers communautaires</h4>
                    <p>Projet de vergers communautaires pour la sécurité alimentaire.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
