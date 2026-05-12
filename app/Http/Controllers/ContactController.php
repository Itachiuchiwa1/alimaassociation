<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.contact');
    }

    public function store(Request $request): RedirectResponse
    {
        $isAnon = (bool) $request->input('anonymous', false);

        if ($isAnon) {
            /* ── Question anonyme ─────────────────────────── */
            $validated = $request->validate([
                'question' => ['required', 'string', 'min:10', 'max:1000'],
            ], [
                'question.required' => 'La question est obligatoire.',
                'question.min'      => 'Minimum 10 caractères.',
            ]);

            Contact::create([
                'question'       => $validated['question'],
                'is_anonymous'   => true,
            ]);

            return back()->with('anon_success', 'Votre question a bien été envoyée. Nous vous répondrons bientôt.');
        }

        /* ── Message de contact normal ────────────────────── */
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:5', 'max:1000'],
        ], [
            'name.required'    => 'Le nom est obligatoire.',
            'email.required'   => 'L\'email est obligatoire.',
            'email.email'      => 'Email invalide.',
            'message.required' => 'Le message est obligatoire.',
            'message.min'      => 'Le message est trop court (min 5 caractères).',
        ]);

        Contact::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'message' => $validated['message'],
        ]);

        return back()->with('contact_success', 'Votre message a bien été envoyé. Merci !');
    }
}
