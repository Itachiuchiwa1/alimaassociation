<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;

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
