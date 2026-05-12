<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class SiteSettingController extends Controller
{
    public function index(): View
    {
        $address = SiteSetting::where('key', 'address')->first()?->value ?? '';
        $phone = SiteSetting::where('key', 'phone')->first()?->value ?? '';
        $email = SiteSetting::where('key', 'email')->first()?->value ?? '';

        return view('admin.settings.index', compact('address', 'phone', 'email'));
    }

    public function update(\Illuminate\Http\Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'address' => 'nullable|string|max:255',
            'phone'   => 'nullable|string|max:20',
            'email'   => 'nullable|email|max:255',
        ]);

        SiteSetting::set('address', $validated['address'] ?? '');
        SiteSetting::set('phone', $validated['phone'] ?? '');
        SiteSetting::set('email', $validated['email'] ?? '');

        return redirect()->route('admin.settings.index')->with('success', 'Paramètres mis à jour.');
    }
}
