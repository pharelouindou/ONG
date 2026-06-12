@extends('layouts.app')

@section('title', $project->title . ' | ADéProG-ONG')
@section('meta_description', $project->description)

@section('content')

{{-- Hero --}}
<section class="pd-hero" style="--hero-img: url('{{ $project->imageUrl() }}')">
    <div class="pd-hero-overlay"></div>
    <div class="container pd-hero-content">
        <nav class="pd-breadcrumb" aria-label="Fil d'Ariane">
            <a href="{{ route('home') }}">Accueil</a>
            <span>›</span>
            <a href="{{ route('actions') }}">Actions</a>
            <span>›</span>
            <span>{{ $project->title }}</span>
        </nav>
        <div class="pd-hero-badges">
            <span class="pd-badge pd-badge-tag">{{ $project->tag }}</span>
            @if($project->year)
            <span class="pd-badge">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                    <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/>
                    <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                {{ $project->year }}
            </span>
            @endif
            @if($project->zone)
            <span class="pd-badge">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                    <circle cx="12" cy="10" r="3"/>
                </svg>
                {{ $project->zone }}
            </span>
            @endif
        </div>
        <h1 class="pd-hero-title">{{ $project->title }}</h1>
        <p class="pd-hero-lead">{{ $project->description }}</p>
    </div>
</section>

{{-- Contenu principal --}}
<div class="section pd-main">
    <div class="container">
        <div class="pd-layout">

            {{-- Colonne principale --}}
            <div class="pd-content">
                <div class="pd-block">
                    <h2 class="pd-section-title">À propos de ce projet</h2>
                    <p class="pd-text">{{ $project->description }}</p>
                    <p class="pd-text">{{ $project->details }}</p>
                </div>

                {{-- Galerie --}}
                @php $galleryUrls = $project->galleryUrls(); @endphp
                @if(!empty($galleryUrls))
                <div class="pd-block">
                    <h2 class="pd-section-title">Galerie photos</h2>
                    <div class="pd-gallery">
                        <div class="pd-gallery-main">
                            <img src="{{ $project->imageUrl() }}"
                                 alt="{{ $project->alt_text }}"
                                 loading="lazy" id="pd-main-img" />
                        </div>
                        <div class="pd-gallery-thumbs">
                            <div class="pd-thumb active"
                                 data-src="{{ $project->imageUrl() }}"
                                 data-alt="{{ $project->alt_text }}">
                                <img src="{{ $project->imageUrl() }}"
                                     alt="{{ $project->alt_text }}" loading="lazy" />
                            </div>
                            @foreach($galleryUrls as $gi => $gUrl)
                            <div class="pd-thumb"
                                 data-src="{{ $gUrl }}"
                                 data-alt="Photo du projet — {{ $project->title }}">
                                <img src="{{ $gUrl }}"
                                     alt="Photo {{ $gi + 2 }} du projet {{ $project->title }}"
                                     loading="lazy" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <aside class="pd-sidebar">

                {{-- Statistiques --}}
                @if(!empty($project->stats))
                <div class="pd-widget">
                    <h3 class="pd-widget-title">Résultats clés</h3>
                    <div class="pd-stats-list">
                        @foreach($project->stats as $stat)
                        <div class="pd-stat-row">
                            <strong>{{ $stat['value'] }}</strong>
                            <span>{{ $stat['label'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Infos --}}
                <div class="pd-widget">
                    <h3 class="pd-widget-title">Informations</h3>
                    <ul class="pd-info-list">
                        <li>
                            <span class="pd-info-label">Domaine</span>
                            <span class="pd-info-value pd-tag-inline">{{ $project->tag }}</span>
                        </li>
                        @if($project->year)
                        <li>
                            <span class="pd-info-label">Période</span>
                            <span class="pd-info-value">{{ $project->year }}</span>
                        </li>
                        @endif
                        @if($project->zone)
                        <li>
                            <span class="pd-info-label">Zone</span>
                            <span class="pd-info-value">{{ $project->zone }}</span>
                        </li>
                        @endif
                        <li>
                            <span class="pd-info-label">Organisation</span>
                            <span class="pd-info-value">ADéProG-ONG</span>
                        </li>
                    </ul>
                </div>

                {{-- CTA --}}
                <div class="pd-widget pd-widget-cta">
                    <p>Vous souhaitez soutenir ce projet ou en savoir plus ?</p>
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-full">Nous contacter</a>
                </div>

            </aside>
        </div>
    </div>
</div>

{{-- Navigation précédent / suivant --}}
@if($prevProject || $nextProject)
<section class="pd-nav-section section-alt">
    <div class="container">
        <div class="pd-nav-projects">
            @if($prevProject)
            <a href="{{ route('project.detail', $prevProject->slug) }}" class="pd-nav-link pd-nav-prev">
                <span class="pd-nav-dir">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"/>
                    </svg>
                    Projet précédent
                </span>
                <div class="pd-nav-thumb">
                    <img src="{{ $prevProject->imageUrl() }}" alt="{{ $prevProject->alt_text }}" loading="lazy" />
                </div>
                <div class="pd-nav-info">
                    <span class="pd-nav-tag">{{ $prevProject->tag }}</span>
                    <strong>{{ $prevProject->title }}</strong>
                </div>
            </a>
            @else
            <div></div>
            @endif

            @if($nextProject)
            <a href="{{ route('project.detail', $nextProject->slug) }}" class="pd-nav-link pd-nav-next">
                <span class="pd-nav-dir">
                    Projet suivant
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </span>
                <div class="pd-nav-thumb">
                    <img src="{{ $nextProject->imageUrl() }}" alt="{{ $nextProject->alt_text }}" loading="lazy" />
                </div>
                <div class="pd-nav-info">
                    <span class="pd-nav-tag">{{ $nextProject->tag }}</span>
                    <strong>{{ $nextProject->title }}</strong>
                </div>
            </a>
            @endif
        </div>

        <div class="pd-back-center">
            <a href="{{ route('actions') }}" class="btn btn-outline">← Voir toutes les actions</a>
        </div>
    </div>
</section>
@endif

@endsection

@push('scripts')
<script>
(function () {
    const mainImg = document.getElementById('pd-main-img');
    const thumbs  = document.querySelectorAll('.pd-thumb');
    thumbs.forEach(thumb => {
        thumb.addEventListener('click', () => {
            thumbs.forEach(t => t.classList.remove('active'));
            thumb.classList.add('active');
            mainImg.style.opacity = '0';
            setTimeout(() => {
                mainImg.src = thumb.dataset.src;
                mainImg.alt = thumb.dataset.alt;
                mainImg.style.opacity = '1';
            }, 200);
        });
    });
})();
</script>
@endpush
