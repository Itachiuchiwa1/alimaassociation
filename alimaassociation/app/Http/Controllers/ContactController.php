<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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

            // Enregistrer ou envoyer par mail
            Log::info('Question anonyme DÉMÉ', ['question' => $validated['question']]);

            /*
            Mail::raw('Question anonyme : ' . $validated['question'], function ($m) {
                $m->to(config('mail.from.address'))->subject('Question anonyme DÉMÉ');
            });
            */

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

        Log::info('Message contact DÉMÉ', $validated);

        /*
        Mail::send([], [], function ($m) use ($validated) {
            $m->to(config('mail.from.address'))
              ->subject('Nouveau message DÉMÉ — ' . $validated['name'])
              ->setBody(
                  "Nom : {$validated['name']}\nEmail : {$validated['email']}\n\n{$validated['message']}",
                  'text/plain'
              );
        });
        */

        return back()->with('contact_success', 'Votre message a bien été envoyé. Merci !');
    }
}
