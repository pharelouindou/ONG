@extends('layouts.app')

@section('title', 'Actualités & événements | ADéProG-ONG')
@section('meta_description', 'Actualités, événements et agenda des activités de ADéProG-ONG.')

@section('content')
@include('partials.page-hero', [
    'tag' => 'Veille',
    'title' => 'Actualités & événements',
    'subtitle' => 'Suivez nos activités sur le terrain et nos annonces.',
])

<section class="section">
    <div class="container">
        <div class="news-grid">
            @foreach (config('site.news') as $item)
                <article class="news-card news-card-photo">
                    <div class="news-card-image">
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" loading="lazy" />
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
