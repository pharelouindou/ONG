@extends('layouts.app')

@section('title', 'Partenaires & Transparence | ADéProG-ONG')
@section('meta_description', 'Partenaires institutionnels et documents de transparence de ADéProG-ONG au Bénin.')

@section('content')
@include('partials.page-hero', [
    'heroClass' => 'ph-partners',
    'tag'       => 'Réseau & Redevabilité',
    'title'     => 'Partenaires & Transparence',
    'subtitle'  => 'Ensemble pour un développement durable, avec un engagement fort pour la redevabilité.',
    'icon'      => '🤝',
])

{{-- ── Intro partenaires ───────────────────────────────────────────────────── --}}
<section class="section">
    <div class="container">
        <div class="split-feature" style="margin-bottom: 3rem;">
            <div class="split-feature-image">
                <img src="{{ asset('images/activites/groupe-beneficiaires.jpg') }}"
                     alt="Partenariat terrain ADéProG" loading="lazy" />
            </div>
            <div class="split-feature-text">
                <p>
                    ADéProG collabore avec les institutions publiques, les organisations sœurs
                    et les communautés locales pour maximiser l'impact de ses interventions dans le Borgou.
                </p>
            </div>
        </div>

        <div class="section-header">
            <span class="section-tag">Institutionnels</span>
            <h2>Partenaires de mise en œuvre</h2>
        </div>
        <div class="partners-grid">
            <article class="partner-card">
                <h3>Ministère de la Santé du Bénin</h3>
                <p>Financement et supervision du projet SRHR (Accord N°5608/STBF-MS-BENIN).</p>
            </article>
            <article class="partner-card">
                <h3>Direction Départementale de la Santé du Borgou</h3>
                <p>Encadrement technique et coordination des activités sanitaires.</p>
            </article>
            <article class="partner-card">
                <h3>Agence Nationale des Soins de Santé Primaires (ANSP)</h3>
                <p>Appui à la mise en œuvre des activités de santé communautaire.</p>
            </article>
            <article class="partner-card">
                <h3>Ambassade des Pays-Bas au Bénin</h3>
                <p>Appui externe au renforcement des capacités de l'organisation.</p>
            </article>
        </div>
    </div>
</section>

{{-- ── Pistes de partenariat ───────────────────────────────────────────────── --}}
<section class="section section-alt">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Collaboration</span>
            <h2>Pistes de partenariat</h2>
        </div>
        <div class="cards-3">
            <article class="card">
                <h3>Projets d'impact</h3>
                <p>Implémentation de projets d'impact dans le Nord Bénin aux côtés de bailleurs et investisseurs.</p>
            </article>
            <article class="card">
                <h3>Financement</h3>
                <p>Accompagnement dans l'identification d'opportunités de financement et connexions avec des bailleurs.</p>
            </article>
            <article class="card">
                <h3>Réseau</h3>
                <p>Accès élargi aux réseaux d'acteurs privés, ONG et partenaires techniques.</p>
            </article>
        </div>
        <div class="cta-box">
            <p>Vous souhaitez collaborer avec ADéProG-ONG ?</p>
            <a href="{{ route('contact') }}" class="btn btn-primary">Proposer un partenariat</a>
        </div>
    </div>
</section>

{{-- ── Documents & Transparence (depuis DB) ───────────────────────────────── --}}
<section class="section" id="transparence">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Redevabilité</span>
            <h2>Documents & Transparence</h2>
        </div>
        <div class="about-text" style="margin-bottom: 2rem;">
            <p>
                ADéProG s'engage pour la transparence et la redevabilité. Cette section met à disposition
                les rapports annuels, documents stratégiques et comptes rendus financiers de l'organisation.
            </p>
        </div>
        <div class="docs-grid">
            @forelse($documents as $doc)
                <article class="doc-card {{ $doc->file_path ? '' : 'doc-card-muted' }}">
                    <span class="doc-type">{{ $doc->doc_type }}</span>
                    <h3>{{ $doc->title }}</h3>
                    <p>{{ $doc->description }}</p>
                    @if($doc->fileUrl())
                        <a href="{{ $doc->fileUrl() }}"
                           class="btn btn-outline btn-sm" download>
                            Télécharger
                        </a>
                    @endif
                </article>
            @empty
                <p style="color: var(--text-muted);">Aucun document disponible pour le moment.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
