@extends('admin.layout')
@section('page_title', 'Projets')

@section('content')
<div class="admin-section-header">
    <h2>Projets ({{ $projects->total() }})</h2>
    <a href="{{ route('admin.projects.create') }}" class="btn-admin btn-accent">+ Nouveau projet</a>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Tag</th>
                <th>Zone</th>
                <th>Statut</th>
                <th style="width:140px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <td style="font-weight:500;">{{ $project->title }}</td>
                <td><span class="badge badge-gray">{{ $project->tag }}</span></td>
                <td style="color:var(--muted);">{{ $project->zone ?? '—' }}</td>
                <td>
                    <span class="badge {{ $project->is_published ? 'badge-green' : 'badge-gray' }}">
                        {{ $project->is_published ? 'Publié' : 'Masqué' }}
                    </span>
                </td>
                <td>
                    <div style="display:flex;gap:.4rem;">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn-admin btn-outline-sm">Modifier</a>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}"
                              onsubmit="return confirm('Supprimer ce projet ?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-admin btn-danger-sm">Suppr.</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;color:var(--muted);padding:2rem;">Aucun projet.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($projects->hasPages())
        <div class="pagination-wrap">{{ $projects->links() }}</div>
    @endif
</div>
@endsection
