<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\Admin\ActionController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\Admin\GalleryImageController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\SiteSettingController;

/* ── Pages statiques ─────────────────────────────────────── */
Route::get('/',          [PageController::class, 'home']   )->name('home');
Route::get('/a-propos',  [PageController::class, 'about']  )->name('about');
Route::get('/actions',   [PageController::class, 'actions'])->name('actions');
Route::get('/galerie',   [PageController::class, 'gallery'])->name('gallery');
Route::get('/blog',      [PageController::class, 'blog']   )->name('blog');

/* ── Contact ─────────────────────────────────────────────── */
Route::get('/contact',   [ContactController::class,  'index'])->name('contact');
Route::post('/contact',  [ContactController::class,  'store'])->name('contact.store');

/* ── Don ─────────────────────────────────────────────────── */
Route::get('/don',       [DonationController::class, 'index'])->name('donation');
Route::post('/don',      [DonationController::class, 'store'])->name('donation.store');

/* ── Admin ────────────────────────────────────────────────── */
Route::prefix('admin')->name('admin.')->group(function () {

    /* Accueil admin */
    Route::get('/', function () {
        return redirect()->route('admin.settings.index');
    });

    /* Paramètres du site */
    Route::get('/settings',          [SiteSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings',         [SiteSettingController::class, 'update'])->name('settings.update');

    /* Actions */
    Route::resource('actions', ActionController::class);

    /* Catégories Blog */
    Route::resource('blog-categories', BlogCategoryController::class);

    /* Articles Blog */
    Route::resource('blog-posts', BlogPostController::class);

    /* Catégories Galerie */
    Route::resource('gallery-categories', GalleryCategoryController::class);

    /* Images Galerie */
    Route::resource('gallery-images', GalleryImageController::class);

    /* Contacts */
    Route::get('/contacts',           [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::patch('/contacts/{contact}/read', [AdminContactController::class, 'markAsRead'])->name('contacts.read');
    Route::delete('/contacts/{contact}',     [AdminContactController::class, 'destroy'])->name('contacts.destroy');
});

