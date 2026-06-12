@extends('layouts.app')

@section('title', 'Transparence | ADéProG-ONG')
@section('meta_description', 'Rapports annuels, documents stratégiques et comptes rendus financiers de ADéProG-ONG.')

@section('content')
@include('partials.page-hero', [
    'tag' => 'Redevabilité',
    'title' => 'Transparence',
    'subtitle' => 'Documents publics, rapports et redevabilité envers nos partenaires et bénéficiaires.',
])

<section class="section">
    <div class="container">
        <div class="about-text">
            <p>
                ADéProG s'engage pour la transparence et la redevabilité. Cette section met à disposition
                les rapports annuels, documents stratégiques et comptes rendus financiers de l'organisation.
            </p>
        </div>

        <div class="docs-grid">
            <article class="doc-card">
                <span class="doc-type">PDF</span>
                <h3>Profilage institutionnel 2026</h3>
                <p>Document de présentation de l'organisation, de ses activités et de ses résultats.</p>
                <a href="{{ asset('documents/profilage-adeprog-2026.pdf') }}" class="btn btn-outline btn-sm" download>
                    Télécharger
                </a>
            </article>
            <article class="doc-card doc-card-muted">
                <span class="doc-type">À venir</span>
                <h3>Rapport annuel 2025</h3>
                <p>Bilan complet des activités et résultats de l'année 2025.</p>
            </article>
            <article class="doc-card doc-card-muted">
                <span class="doc-type">À venir</span>
                <h3>Comptes rendus financiers</h3>
                <p>Documents comptables validés par le Commissariat aux Comptes.</p>
            </article>
            <article class="doc-card doc-card-muted">
                <span class="doc-type">À venir</span>
                <h3>Plan stratégique</h3>
                <p>Orientations et priorités d'intervention de l'organisation.</p>
            </article>
        </div>
    </div>
</section>
@endsection
