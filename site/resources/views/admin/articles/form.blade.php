@extends('admin.layout')
@section('page_title', $article->exists ? 'Modifier l\'article' : 'Nouvel article')

@section('content')
<div class="admin-section-header">
    <h2>{{ $article->exists ? 'Modifier l\'article' : 'Nouvel article' }}</h2>
    <a href="{{ route('admin.articles.index') }}" class="btn-admin btn-outline-sm">← Retour</a>
</div>

@if($errors->any())
    <ul class="error-list">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
@endif

<div class="form-card">
    <form method="POST"
          action="{{ $article->exists ? route('admin.articles.update', $article) : route('admin.articles.store') }}"
          enctype="multipart/form-data">
        @csrf
        @if($article->exists) @method('PUT') @endif

        <div class="form-group">
            <label for="title">Titre *</label>
            <input id="title" name="title" type="text" class="form-control"
                   value="{{ old('title', $article->title) }}" required />
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="label">Label (ex : Décembre 2025)</label>
                <input id="label" name="label" type="text" class="form-control"
                       value="{{ old('label', $article->label) }}" />
            </div>
            <div class="form-group">
                <label for="published_at">Date de publication</label>
                <input id="published_at" name="published_at" type="date" class="form-control"
                       value="{{ old('published_at', $article->published_at?->format('Y-m-d')) }}" />
            </div>
        </div>

        <div class="form-group">
            <label for="excerpt">Résumé court</label>
            <textarea id="excerpt" name="excerpt" class="form-control" style="min-height:80px;">{{ old('excerpt', $article->excerpt) }}</textarea>
        </div>

        <div class="form-group">
            <label for="content">Contenu complet</label>
            <textarea id="content" name="content" class="form-control">{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image (JPG/PNG, max 4 Mo)</label>
            @if($article->image_path)
                <div style="margin-bottom:.5rem;">
                    <img src="{{ Storage::url($article->image_path) }}" style="height:80px;border-radius:6px;object-fit:cover;" />
                </div>
            @endif
            <input id="image" name="image" type="file" class="form-control" accept="image/*" />
        </div>

        <div class="form-check" style="margin-bottom:1rem;">
            <input id="is_published" name="is_published" type="checkbox" value="1"
                   {{ old('is_published', $article->is_published) ? 'checked' : '' }} />
            <label for="is_published">Publier cet article</label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-admin btn-accent">
                {{ $article->exists ? 'Enregistrer' : 'Publier' }}
            </button>
            <a href="{{ route('admin.articles.index') }}" class="btn-admin btn-outline-sm">Annuler</a>
        </div>
    </form>
</div>
@endsection
