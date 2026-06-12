@extends('admin.layout')
@section('page_title', $document->exists ? 'Modifier le document' : 'Nouveau document')

@section('content')
<div class="admin-section-header">
    <h2>{{ $document->exists ? 'Modifier le document' : 'Nouveau document' }}</h2>
    <a href="{{ route('admin.documents.index') }}" class="btn-admin btn-outline-sm">← Retour</a>
</div>

@if($errors->any())
    <ul class="error-list">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
@endif

<div class="form-card">
    <form method="POST"
          action="{{ $document->exists ? route('admin.documents.update', $document) : route('admin.documents.store') }}"
          enctype="multipart/form-data">
        @csrf
        @if($document->exists) @method('PUT') @endif

        <div class="form-group">
            <label for="title">Titre du document *</label>
            <input id="title" name="title" type="text" class="form-control"
                   value="{{ old('title', $document->title) }}" required />
        </div>

        <div class="form-group">
            <label for="doc_type">Type de document *</label>
            <select id="doc_type" name="doc_type" class="form-control">
                @foreach(['PDF', 'Word', 'Excel', 'À venir', 'Autre'] as $t)
                    <option value="{{ $t }}" {{ old('doc_type', $document->doc_type) === $t ? 'selected' : '' }}>{{ $t }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" style="min-height:80px;">{{ old('description', $document->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="file">Fichier (PDF, DOC, max 20 Mo)</label>
            @if($document->file_path)
                <div style="margin-bottom:.5rem;">
                    <a href="{{ Storage::url($document->file_path) }}" target="_blank"
                       style="color:var(--accent);font-size:.85rem;">📄 Fichier actuel</a>
                </div>
            @endif
            <input id="file" name="file" type="file" class="form-control"
                   accept=".pdf,.doc,.docx,application/pdf" />
            <p class="form-hint">Laisser vide pour conserver le fichier existant.</p>
        </div>

        <div class="form-check" style="margin-bottom:1rem;">
            <input id="is_published" name="is_published" type="checkbox" value="1"
                   {{ old('is_published', $document->is_published ?? true) ? 'checked' : '' }} />
            <label for="is_published">Visible sur le site</label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-admin btn-accent">
                {{ $document->exists ? 'Enregistrer' : 'Ajouter' }}
            </button>
            <a href="{{ route('admin.documents.index') }}" class="btn-admin btn-outline-sm">Annuler</a>
        </div>
    </form>
</div>
@endsection
