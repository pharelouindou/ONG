@extends('admin.layout')
@section('page_title', 'Documents')

@section('content')
<div class="admin-section-header">
    <h2>Documents ({{ $documents->total() }})</h2>
    <a href="{{ route('admin.documents.create') }}" class="btn-admin btn-accent">+ Nouveau document</a>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Type</th>
                <th>Fichier</th>
                <th>Statut</th>
                <th style="width:140px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($documents as $doc)
            <tr>
                <td style="font-weight:500;">{{ $doc->title }}</td>
                <td><span class="badge badge-gray">{{ $doc->doc_type }}</span></td>
                <td>
                    @if($doc->file_path)
                        <a href="{{ Storage::url($doc->file_path) }}" target="_blank"
                           style="color:var(--accent);font-size:.8rem;">Télécharger</a>
                    @else
                        <span style="color:var(--muted);font-size:.8rem;">—</span>
                    @endif
                </td>
                <td>
                    <span class="badge {{ $doc->is_published ? 'badge-green' : 'badge-gray' }}">
                        {{ $doc->is_published ? 'Visible' : 'Masqué' }}
                    </span>
                </td>
                <td>
                    <div style="display:flex;gap:.4rem;">
                        <a href="{{ route('admin.documents.edit', $doc) }}" class="btn-admin btn-outline-sm">Modifier</a>
                        <form method="POST" action="{{ route('admin.documents.destroy', $doc) }}"
                              onsubmit="return confirm('Supprimer ce document ?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-admin btn-danger-sm">Suppr.</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;color:var(--muted);padding:2rem;">Aucun document.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($documents->hasPages())
        <div class="pagination-wrap">{{ $documents->links() }}</div>
    @endif
</div>
@endsection
