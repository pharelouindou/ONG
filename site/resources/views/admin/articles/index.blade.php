@extends('admin.layout')
@section('page_title', 'Actualités')

@section('content')
<div class="admin-section-header">
    <h2>Actualités ({{ $articles->total() }})</h2>
    <a href="{{ route('admin.articles.create') }}" class="btn-admin btn-accent">+ Nouvel article</a>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Label</th>
                <th>Date</th>
                <th>Statut</th>
                <th style="width:140px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($articles as $article)
            <tr>
                <td style="font-weight:500;">{{ $article->title }}</td>
                <td style="color:var(--muted);">{{ $article->label ?? '—' }}</td>
                <td style="color:var(--muted);">{{ $article->published_at?->format('d/m/Y') ?? '—' }}</td>
                <td>
                    <span class="badge {{ $article->is_published ? 'badge-green' : 'badge-gray' }}">
                        {{ $article->is_published ? 'Publié' : 'Brouillon' }}
                    </span>
                </td>
                <td>
                    <div style="display:flex;gap:.4rem;">
                        <a href="{{ route('admin.articles.edit', $article) }}" class="btn-admin btn-outline-sm">Modifier</a>
                        <form method="POST" action="{{ route('admin.articles.destroy', $article) }}"
                              onsubmit="return confirm('Supprimer cet article ?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-admin btn-danger-sm">Suppr.</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;color:var(--muted);padding:2rem;">Aucun article.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($articles->hasPages())
        <div class="pagination-wrap">{{ $articles->links() }}</div>
    @endif
</div>
@endsection
