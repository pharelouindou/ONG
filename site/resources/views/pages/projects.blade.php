@extends('layouts.app')

@section('title', 'Projets & interventions | ADéProG-ONG')
@section('meta_description', 'Projets de nutrition, santé communautaire et agroécologie menés par ADéProG-ONG au Borgou.')

@section('content')
@include('partials.page-hero', [
    'tag' => 'Nos actions',
    'title' => 'Projets & interventions',
    'subtitle' => 'Des actions concrètes au service des communautés du Nord Bénin.',
])

<section class="section">
    <div class="container">
        <div class="photo-cards-grid">
            @foreach (config('site.projects') as $project)
                <article class="photo-card">
                    <div class="photo-card-image">
                        <img src="{{ asset($project['image']) }}" alt="{{ $project['alt'] }}" loading="lazy" />
                    </div>
                    <div class="photo-card-body">
                        <div class="project-tag">{{ $project['tag'] }}</div>
                        <h3>{{ $project['title'] }}</h3>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Méthode</span>
            <h2>Notre stratégie d'intervention</h2>
        </div>
        <div class="split-feature split-feature-reverse">
            <div class="split-feature-image">
                <img src="{{ asset('images/activites/nutrition-sensibilisation.jpg') }}" alt="Sensibilisation communautaire ADéProG" loading="lazy" />
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
@endsection
