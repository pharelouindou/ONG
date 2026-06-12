<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::latest()->paginate(15);
        return view('admin.articles.index', compact('articles'));
    }

    public function create(): View
    {
        return view('admin.articles.form', ['article' => new Article()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'label'        => ['nullable', 'string', 'max:100'],
            'excerpt'      => ['nullable', 'string'],
            'content'      => ['nullable', 'string'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['boolean'],
            'image'        => ['nullable', 'image', 'max:4096'],
        ]);

        $data['slug']         = Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('articles', 'public');
        }

        Article::create($data);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article publié avec succès.');
    }

    public function edit(Article $article): View
    {
        return view('admin.articles.form', compact('article'));
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $data = $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'label'        => ['nullable', 'string', 'max:100'],
            'excerpt'      => ['nullable', 'string'],
            'content'      => ['nullable', 'string'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['boolean'],
            'image'        => ['nullable', 'image', 'max:4096'],
        ]);

        $data['slug']         = Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article mis à jour.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()->route('admin.articles.index')
            ->with('success', 'Article supprimé.');
    }
}
