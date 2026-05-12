<?php

namespace App\Http\Controllers;

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

    public function actions(): View
    {
        return view('pages.actions');
    }

    public function gallery(): View
    {
        return view('pages.gallery');
    }

    public function blog(): View
    {
        return view('pages.blog');
    }
}
