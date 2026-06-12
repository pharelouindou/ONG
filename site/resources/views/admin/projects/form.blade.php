@extends('admin.layout')
@section('page_title', $project->exists ? 'Modifier le projet' : 'Nouveau projet')

@section('content')
<div class="admin-section-header">
    <h2>{{ $project->exists ? 'Modifier le projet' : 'Nouveau projet' }}</h2>
    <a href="{{ route('admin.projects.index') }}" class="btn-admin btn-outline-sm">← Retour</a>
</div>

@if($errors->any())
    <ul class="error-list">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
@endif

<div class="form-card" style="max-width:800px;">
    <form method="POST"
          action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}"
          enctype="multipart/form-data">
        @csrf
        @if($project->exists) @method('PUT') @endif

        <div class="form-row">
            <div class="form-group">
                <label for="title">Titre *</label>
                <input id="title" name="title" type="text" class="form-control"
                       value="{{ old('title', $project->title) }}" required />
            </div>
            <div class="form-group">
                <label for="tag">Tag / Domaine *</label>
                <input id="tag" name="tag" type="text" class="form-control"
                       value="{{ old('tag', $project->tag) }}" placeholder="Nutrition, Agroécologie…" required />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="year">Période</label>
                <input id="year" name="year" type="text" class="form-control"
                       value="{{ old('year', $project->year) }}" placeholder="2024–2025" />
            </div>
            <div class="form-group">
                <label for="zone">Zone géographique</label>
                <input id="zone" name="zone" type="text" class="form-control"
                       value="{{ old('zone', $project->zone) }}" placeholder="Nikki, Sinendé…" />
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description courte</label>
            <textarea id="description" name="description" class="form-control" style="min-height:80px;">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="details">Détails complets</label>
            <textarea id="details" name="details" class="form-control">{{ old('details', $project->details) }}</textarea>
        </div>

        {{-- Statistiques --}}
        <div class="form-group">
            <label>Statistiques clés</label>
            <div class="stat-row-group" id="stat-rows">
                @php $stats = old('stat_value') ? array_map(null, old('stat_value',[]), old('stat_label',[])) : ($project->stats ?? [['value'=>'','label'=>''],['value'=>'','label'=>''],['value'=>'','label'=>'']]) @endphp
                @foreach($stats as $i => $s)
                <div class="stat-row">
                    <input name="stat_value[]" type="text" class="form-control"
                           placeholder="730+" value="{{ is_array($s) ? ($s['value'] ?? '') : '' }}" />
                    <input name="stat_label[]" type="text" class="form-control"
                           placeholder="Enfants dépistés" value="{{ is_array($s) ? ($s['label'] ?? '') : '' }}" />
                    <button type="button" class="btn-icon" onclick="this.closest('.stat-row').remove()">✕</button>
                </div>
                @endforeach
            </div>
            <button type="button" class="btn-admin btn-outline-sm" style="margin-top:.5rem;" onclick="addStatRow()">+ Ajouter stat</button>
        </div>

        {{-- Image principale --}}
        <div class="form-group">
            <label for="image">Image principale (max 4 Mo)</label>
            @if($project->image_path)
                <div style="margin-bottom:.5rem;">
                    <img src="{{ Storage::url($project->image_path) }}" style="height:80px;border-radius:6px;object-fit:cover;" />
                </div>
            @endif
            <input id="image" name="image" type="file" class="form-control" accept="image/*" />
            <div class="form-group" style="margin-top:.5rem;">
                <label for="alt_text">Texte alternatif image</label>
                <input id="alt_text" name="alt_text" type="text" class="form-control"
                       value="{{ old('alt_text', $project->alt_text) }}" />
            </div>
        </div>

        {{-- Galerie --}}
        <div class="form-group">
            <label for="gallery">Galerie photos (sélection multiple)</label>
            @if(!empty($project->gallery))
                <div style="display:flex;gap:.5rem;flex-wrap:wrap;margin-bottom:.5rem;">
                    @foreach($project->gallery as $g)
                        <img src="{{ Storage::url($g) }}" style="height:60px;border-radius:4px;object-fit:cover;" />
                    @endforeach
                </div>
            @endif
            <input id="gallery" name="gallery[]" type="file" class="form-control" accept="image/*" multiple />
            <p class="form-hint">Les nouvelles images s'ajoutent à la galerie existante.</p>
        </div>

        <div class="form-check" style="margin-bottom:1rem;">
            <input id="is_published" name="is_published" type="checkbox" value="1"
                   {{ old('is_published', $project->is_published ?? true) ? 'checked' : '' }} />
            <label for="is_published">Projet visible sur le site</label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-admin btn-accent">
                {{ $project->exists ? 'Enregistrer' : 'Créer le projet' }}
            </button>
            <a href="{{ route('admin.projects.index') }}" class="btn-admin btn-outline-sm">Annuler</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
function addStatRow() {
    const container = document.getElementById('stat-rows');
    const div = document.createElement('div');
    div.className = 'stat-row';
    div.innerHTML = `
        <input name="stat_value[]" type="text" class="form-control" placeholder="Ex: 500+" />
        <input name="stat_label[]" type="text" class="form-control" placeholder="Ex: Bénéficiaires" />
        <button type="button" class="btn-icon" onclick="this.closest('.stat-row').remove()">✕</button>
    `;
    container.appendChild(div);
}
</script>
@endpush
