<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminProject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminProjectController extends Controller
{
    public function index(): View
    {
        $projects = AdminProject::latest()->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('admin.projects.form', ['project' => new AdminProject()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'tag'          => ['required', 'string', 'max:100'],
            'title'        => ['required', 'string', 'max:255'],
            'alt_text'     => ['nullable', 'string', 'max:255'],
            'year'         => ['nullable', 'string', 'max:50'],
            'zone'         => ['nullable', 'string', 'max:255'],
            'description'  => ['nullable', 'string'],
            'details'      => ['nullable', 'string'],
            'is_published' => ['boolean'],
            'image'        => ['nullable', 'image', 'max:4096'],
            'gallery.*'    => ['nullable', 'image', 'max:4096'],
            'stats'        => ['nullable', 'string'], // JSON string from textarea
        ]);

        $data['slug']         = Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        // Stats : decode JSON string ou construire depuis champs
        $data['stats'] = $this->parseStats($request);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('projects', 'public');
        }

        $gallery = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('projects/gallery', 'public');
            }
        }
        $data['gallery'] = $gallery ?: null;

        AdminProject::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Projet créé avec succès.');
    }

    public function edit(AdminProject $project): View
    {
        return view('admin.projects.form', compact('project'));
    }

    public function update(Request $request, AdminProject $project): RedirectResponse
    {
        $data = $request->validate([
            'tag'          => ['required', 'string', 'max:100'],
            'title'        => ['required', 'string', 'max:255'],
            'alt_text'     => ['nullable', 'string', 'max:255'],
            'year'         => ['nullable', 'string', 'max:50'],
            'zone'         => ['nullable', 'string', 'max:255'],
            'description'  => ['nullable', 'string'],
            'details'      => ['nullable', 'string'],
            'is_published' => ['boolean'],
            'image'        => ['nullable', 'image', 'max:4096'],
            'gallery.*'    => ['nullable', 'image', 'max:4096'],
        ]);

        $data['slug']         = Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');
        $data['stats']        = $this->parseStats($request);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('projects', 'public');
        }

        if ($request->hasFile('gallery')) {
            $gallery = $project->gallery ?? [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('projects/gallery', 'public');
            }
            $data['gallery'] = $gallery;
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Projet mis à jour.');
    }

    public function destroy(AdminProject $project): RedirectResponse
    {
        $project->delete();
        return redirect()->route('admin.projects.index')
            ->with('success', 'Projet supprimé.');
    }

    private function parseStats(Request $request): array
    {
        $values = $request->input('stat_value', []);
        $labels = $request->input('stat_label', []);
        $stats  = [];
        foreach ($values as $i => $val) {
            if (!empty($val) && !empty($labels[$i])) {
                $stats[] = ['value' => $val, 'label' => $labels[$i]];
            }
        }
        return $stats;
    }
}
