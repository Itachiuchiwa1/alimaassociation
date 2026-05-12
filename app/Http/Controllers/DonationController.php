<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class DonationController extends Controller
{
    public function index(): View
    {
        return view('pages.donation');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'amount'    => ['required', 'integer', 'min:1', 'max:100000'],
            'prenom'    => ['nullable', 'string', 'max:100'],
            'nom'       => ['nullable', 'string', 'max:100'],
            'email'     => ['nullable', 'email', 'max:255'],
            'recurrent' => ['nullable', 'in:0,1'],
        ], [
            'amount.required' => 'Le montant est obligatoire.',
            'amount.min'      => 'Le montant minimum est 1 €.',
        ]);

        // Ici : intégrer Orange Money / Wave / Stripe / PayPal
        // Pour l'instant on log et on redirige avec succès
        Log::info('Don DÉMÉ', [
            'montant'   => $validated['amount'],
            'recurrent' => $validated['recurrent'] ?? '0',
            'email'     => $validated['email'] ?? 'anonyme',
        ]);

        return back()->with(
            'don_success',
            'Merci pour votre don de ' . $validated['amount'] . ' €. '
            . (($validated['recurrent'] ?? '0') === '1' ? 'Votre abonnement mensuel est enregistré.' : '')
        );
    }
}
