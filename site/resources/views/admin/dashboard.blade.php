@extends('admin.layout')
@section('page_title', 'Tableau de bord')

@section('content')
<div class="stat-cards">
    <div class="stat-card">
        <div class="stat-card-value">{{ $stats['articles'] }}</div>
        <div class="stat-card-label">Actualités</div>
    </div>
    <div class="stat-card">
        <div class="stat-card-value">{{ $stats['projects'] }}</div>
        <div class="stat-card-label">Projets (admin)</div>
    </div>
    <div class="stat-card">
        <div class="stat-card-value">{{ $stats['documents'] }}</div>
        <div class="stat-card-label">Documents</div>
    </div>
</div>

<div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(260px,1fr)); gap:1rem;">
    <div class="table-wrap" style="padding:1.25rem;">
        <h3 style="font-size:.95rem;margin-bottom:.75rem;">Accès rapide</h3>
        <div style="display:flex;flex-direction:column;gap:.5rem;">
            <a href="{{ route('admin.articles.create') }}" class="btn-admin btn-accent">+ Nouvel article</a>
            <a href="{{ route('admin.projects.create') }}" class="btn-admin btn-outline-sm">+ Nouveau projet</a>
            <a href="{{ route('admin.documents.create') }}" class="btn-admin btn-outline-sm">+ Nouveau document</a>
        </div>
    </div>
</div>
@endsection
