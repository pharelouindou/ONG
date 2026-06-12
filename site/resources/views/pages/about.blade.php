@extends('layouts.app')

@section('title', 'À propos | ADéProG-ONG')
@section('meta_description', 'Découvrez l\'histoire, la mission, la vision et l\'équipe de ADéProG-ONG au Bénin.')

@section('content')
@include('partials.page-hero', [
    'heroClass' => 'ph-about',
    'tag'       => 'Qui sommes-nous',
    'title'     => 'À propos de ADéProG-ONG',
    'subtitle'  => 'Une organisation de la société civile engagée pour le développement durable au Borgou.',
    'icon'      => '🌍',
])

<section class="section">
    <div class="container">
        <div class="split-feature" style="margin-bottom: 3rem;">
            <div class="split-feature-image">
                <img src="{{ asset(config('site.images.hero')) }}" alt="Communauté ADéProG à Nikki" loading="lazy" />
            </div>
            <div class="split-feature-text">
                <img src="{{ asset(config('site.images.logo')) }}" alt="Logo ADéProG-ONG" class="about-logo" />
                <p class="about-slogan">{{ config('site.slogan') }}</p>
            </div>
        </div>
        <div class="about-text">
            <p>
                Née le <strong>8 février 2022</strong> sous les auspices du développement durable,
                ADéProG est une ONG fondée par des jeunes cadres (agronomes, sociologues, géographes)
                déterminés à répondre aux défis du développement à la base, en s'inspirant des
                Plans Communaux de Développement et des Objectifs du Développement Durable (ODD).
            </p>
            <p>
                Enregistrée sous le N° <strong>20224/039/PDB/SG/SAG/SA</strong> du 4 avril 2022
                et parue au Journal Officiel le 15 juin 2023, l'organisation est également enregistrée
                auprès de la Direction Départementale de la Santé du Borgou (N°002/2024/MS/SGM/DDS-B/SA).
            </p>
            <p>
                ADéProG couvre les zones sanitaires <strong>Nikki–Kalalé–Pèrèrè (NKP)</strong> et
                <strong>Bembèrèkè–Sinendé (BS)</strong>, avec 14 membres (11 hommes, 3 femmes).
            </p>
        </div>

        <div class="cards-3">
            <article class="card">
                <div class="card-icon">◎</div>
                <h3>Vision</h3>
                <p>
                    D'ici 2030, construire des citoyens capables de s'épanouir pleinement en intégrant
                    les dimensions économique, sociale, environnementale et culturelle du développement durable.
                </p>
            </article>
            <article class="card">
                <div class="card-icon">◈</div>
                <h3>Mission</h3>
                <p>
                    Améliorer durablement les conditions de vie des individus les plus exposés dans
                    les localités à ressources limitées et renforcer leur accès à des services de
                    santé de qualité, dans une perspective d'équité et d'inclusion sociale.
                </p>
            </article>
            <article class="card">
                <div class="card-icon">◇</div>
                <h3>Valeurs</h3>
                <ul class="values-list">
                    <li>Implication communautaire</li>
                    <li>Équité & inclusion</li>
                    <li>Approche basée sur les droits humains</li>
                    <li>Cohérence intersectorielle</li>
                    <li>Orientation résultats</li>
                </ul>
            </article>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Gouvernance</span>
            <h2>Organes statutaires</h2>
        </div>
        <div class="org-grid">
            <div class="org-item">Assemblée Générale (AG)</div>
            <div class="org-item">Conseil d'Administration (CA)</div>
            <div class="org-item">Bureau Exécutif (BE)</div>
            <div class="org-item">Commissariat aux Comptes (CC)</div>
        </div>

        <div class="section-header" style="margin-top: 3rem;">
            <span class="section-tag">Équipe</span>
            <h2>Bureau exécutif</h2>
        </div>
        <div class="team-grid">
            <div class="team-card">
                <div class="team-avatar">MB</div>
                <h4>Mora Broutani Malik</h4>
                <p>Président</p>
                <a href="tel:+22995909814">+229 95 90 98 14</a>
            </div>
            <div class="team-card">
                <div class="team-avatar">IZ</div>
                <h4>Idrissou Zyhad'ine</h4>
                <p>Vice-président</p>
                <a href="tel:+22996708044">+229 96 70 80 44</a>
            </div>
            <div class="team-card">
                <div class="team-avatar">AA</div>
                <h4>Abiola Agnidé</h4>
                <p>Directeur Exécutif</p>
                <a href="tel:+22996453901">+229 96 45 39 01</a>
            </div>
            <div class="team-card">
                <div class="team-avatar">BM</div>
                <h4>Bouko Mohamed</h4>
                <p>Bureau Exécutif</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Terrain</span>
            <h2>Nos activités en images</h2>
        </div>
        @include('partials.gallery')
    </div>
</section>
@endsection
