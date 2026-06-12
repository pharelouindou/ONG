<?php

use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDocumentController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// ─── Pages publiques ───────────────────────────────────────────────────────────
Route::get('/',           [PageController::class, 'home'])->name('home');
Route::get('/a-propos',   [PageController::class, 'about'])->name('about');
Route::get('/actions',    [PageController::class, 'actions'])->name('actions');
Route::get('/partenaires',[PageController::class, 'partners'])->name('partners');
Route::get('/contact',    [PageController::class, 'contact'])->name('contact');
Route::post('/contact',   [ContactController::class, 'store'])->name('contact.store');

// Détail projet
Route::get('/actions/{slug}', [PageController::class, 'projectDetail'])->name('project.detail');

// Redirections permanentes des anciennes URLs
Route::redirect('/projets',     '/actions',    301);
Route::redirect('/actualites',  '/actions',    301);
Route::redirect('/transparence','/partenaires',301);

// ─── Authentification admin ────────────────────────────────────────────────────
Route::get( '/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout',[AdminController::class, 'logout'])->name('admin.logout');

// ─── Zone admin (protégée) ─────────────────────────────────────────────────────
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Actualités
    Route::resource('articles', AdminArticleController::class);

    // Projets
    Route::resource('projects', AdminProjectController::class);

    // Documents de transparence
    Route::resource('documents', AdminDocumentController::class);
});
