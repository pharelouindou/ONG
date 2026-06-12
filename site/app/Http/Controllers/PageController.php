<?php

namespace App\Http\Controllers;

use App\Models\AdminProject;
use App\Models\Article;
use App\Models\Document;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home');
    }

    public function about(): View
    {
        return view('pages.about');
    }

    /** Page Actions : projets + articles depuis la DB */
    public function actions(): View
    {
        $projects = AdminProject::where('is_published', true)
            ->orderBy('id')
            ->get();

        $articles = Article::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->get();

        return view('pages.actions', compact('projects', 'articles'));
    }

    /** Page Partenaires & Transparence : documents depuis la DB */
    public function partners(): View
    {
        $documents = Document::where('is_published', true)
            ->orderBy('id')
            ->get();

        return view('pages.partners', compact('documents'));
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    /** Détail d'un projet depuis la DB */
    public function projectDetail(string $slug): View
    {
        $project = AdminProject::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $prevProject = AdminProject::where('is_published', true)
            ->where('id', '<', $project->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextProject = AdminProject::where('is_published', true)
            ->where('id', '>', $project->id)
            ->orderBy('id')
            ->first();

        return view('pages.project-detail', compact('project', 'prevProject', 'nextProject'));
    }
}
