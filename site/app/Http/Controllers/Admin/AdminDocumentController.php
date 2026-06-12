<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDocumentController extends Controller
{
    public function index(): View
    {
        $documents = Document::latest()->paginate(15);
        return view('admin.documents.index', compact('documents'));
    }

    public function create(): View
    {
        return view('admin.documents.form', ['document' => new Document()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'doc_type'     => ['required', 'string', 'max:50'],
            'description'  => ['nullable', 'string'],
            'is_published' => ['boolean'],
            'file'         => ['nullable', 'mimes:pdf,doc,docx', 'max:20480'],
        ]);

        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('documents', 'public');
        }

        Document::create($data);

        return redirect()->route('admin.documents.index')
            ->with('success', 'Document ajouté.');
    }

    public function edit(Document $document): View
    {
        return view('admin.documents.form', compact('document'));
    }

    public function update(Request $request, Document $document): RedirectResponse
    {
        $data = $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'doc_type'     => ['required', 'string', 'max:50'],
            'description'  => ['nullable', 'string'],
            'is_published' => ['boolean'],
            'file'         => ['nullable', 'mimes:pdf,doc,docx', 'max:20480'],
        ]);

        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('documents', 'public');
        }

        $document->update($data);

        return redirect()->route('admin.documents.index')
            ->with('success', 'Document mis à jour.');
    }

    public function destroy(Document $document): RedirectResponse
    {
        $document->delete();
        return redirect()->route('admin.documents.index')
            ->with('success', 'Document supprimé.');
    }
}
