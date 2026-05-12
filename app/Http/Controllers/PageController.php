<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\BlogPost;
use App\Models\GalleryImage;
use App\Models\SiteSetting;
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
        $actions = Action::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.actions', compact('actions'));
    }

    public function gallery(): View
    {
        $galleryImages = GalleryImage::where('is_active', true)
            ->with('category')
            ->orderBy('order')
            ->get();

        return view('pages.gallery', compact('galleryImages'));
    }

    public function blog(): View
    {
        $blogPosts = BlogPost::where('is_published', true)
            ->with('category')
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        return view('pages.blog', compact('blogPosts'));
    }
}
