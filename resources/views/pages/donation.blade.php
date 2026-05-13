@extends('layouts.app')
@section('title',       'Faire un don — DÉMÉ')
@section('description', 'Soutenez DÉMÉ. Don unique ou récurrent. Chaque contribution change une vie.')

@section('content')

{{-- ══════════════════════════════════════════════════
     HERO SECTION
══════════════════════════════════════════════════ --}}
<section class="relative gradient-hero text-[var(--color-deep-foreground)] overflow-hidden">
  <div class="container-page py-20 md:py-32 text-center max-w-3xl mx-auto">
    <div class="animate-fade-up">
      <svg class="h-8 w-8 mx-auto mb-6 text-[var(--color-secondary)]"
           fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
        <path d="M9 10h6M9 14h4" stroke-linecap="round"/>
      </svg>

      <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
        Votre soutien permet de transformer des vies.
      </h1>

      <p class="mt-6 text-lg md:text-xl opacity-90 max-w-2xl mx-auto leading-relaxed">
        Chaque don, peu importe le montant, finance directement nos actions de sensibilisation,
        de formation et d'accompagnement auprès des jeunes filles.
      </p>

      <div class="mt-10 flex justify-center">
        <a href="#moyens-de-paiement"
           class="inline-flex items-center gap-2 bg-white/15 backdrop-blur border border-white/30
                  text-white font-semibold px-6 py-3 rounded-full hover:bg-white/25 transition-all">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="12 5 12 19"/>
            <polyline points="19 12 12 19 5 12"/>
          </svg>
          Voir les moyens de paiement
        </a>
      </div>
    </div>
  </div>
</section>

{{-- ══════════════════════════════════════════════════
     SECTION MOYENS DE PAIEMENT
══════════════════════════════════════════════════ --}}
<section id="moyens-de-paiement" class="container-page py-24">
  <div class="max-w-4xl mx-auto">
    {{-- En-tête --}}
    <div class="text-center mb-16 animate-fade-up">
      <span class="text-sm font-semibold uppercase tracking-widest text-[var(--color-primary)]">
        Moyens de soutien
      </span>
      <h2 class="mt-3 text-3xl md:text-5xl font-bold leading-tight">
        Choisissez le moyen qui <span class="text-gradient">vous convient</span>.
      </h2>
      <p class="mt-5 text-[var(--color-muted-foreground)] text-lg max-w-xl mx-auto">
        Sélectionnez l'option de transfert la plus pratique pour vous et copiez les
        informations nécessaires. C'est simple et sécurisé.
      </p>
    </div>

    {{-- Grille de cartes de paiement --}}
    <div class="grid md:grid-cols-2 gap-6">

      {{-- Orange Money --}}
      <div class="payment-card group bg-[var(--color-card)] rounded-3xl p-8 border border-[var(--color-border)]
                   shadow-soft hover:shadow-glow hover:-translate-y-1 transition animate-fade-up"
           style="animation-delay: 0ms" x-data="{ copied: false }">
        <div class="flex items-start justify-between mb-6">
          <div>
            <h3 class="font-display text-2xl font-semibold">Orange Money</h3>
            <p class="mt-2 text-sm text-[var(--color-muted-foreground)]">
              Transfert mobile via Orange
            </p>
          </div>
          <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center">
            <svg class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
            </svg>
          </div>
        </div>

        <div class="space-y-4">
          <div>
            <label class="text-xs font-semibold uppercase tracking-widest text-[var(--color-primary)]">
              Code de transfert
            </label>
            <div class="mt-2 flex items-center justify-between p-4 bg-[var(--color-background)] rounded-xl border border-[var(--color-border)]">
              <code class="text-sm font-mono font-semibold text-[var(--color-deep)]">
                *144*2*1*00000000*montant#
              </code>
              <button type="button"
                      @click="navigator.clipboard.writeText('*144*2*1*00000000*montant#'); copied = true; setTimeout(() => copied = false, 2000)"
                      :class="copied ? 'text-green-600' : 'text-[var(--color-primary)]'"
                      class="ml-3 font-semibold text-sm transition-colors hover:opacity-70">
                <span x-show="!copied">Copier</span>
                <span x-show="copied" class="flex items-center gap-1">
                  <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Copié !
                </span>
              </button>
            </div>
            <p class="mt-2 text-xs text-[var(--color-muted-foreground)]">
              Composez <strong>*144*2*1*00000000*montant#</strong> puis appuyez sur Appel
            </p>
          </div>
        </div>
      </div>

      {{-- Moov Money --}}
      <div class="payment-card group bg-[var(--color-card)] rounded-3xl p-8 border border-[var(--color-border)]
                   shadow-soft hover:shadow-glow hover:-translate-y-1 transition animate-fade-up"
           style="animation-delay: 80ms" x-data="{ copied: false }">
        <div class="flex items-start justify-between mb-6">
          <div>
            <h3 class="font-display text-2xl font-semibold">Moov Money</h3>
            <p class="mt-2 text-sm text-[var(--color-muted-foreground)]">
              Transfert mobile via Moov
            </p>
          </div>
          <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center">
            <svg class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
            </svg>
          </div>
        </div>

        <div class="space-y-4">
          <div>
            <label class="text-xs font-semibold uppercase tracking-widest text-[var(--color-primary)]">
              Code de transfert
            </label>
            <div class="mt-2 flex items-center justify-between p-4 bg-[var(--color-background)] rounded-xl border border-[var(--color-border)]">
              <code class="text-sm font-mono font-semibold text-[var(--color-deep)]">
                *155*1*1*00000000*montant#
              </code>
              <button type="button"
                      @click="navigator.clipboard.writeText('*155*1*1*00000000*montant#'); copied = true; setTimeout(() => copied = false, 2000)"
                      :class="copied ? 'text-green-600' : 'text-[var(--color-primary)]'"
                      class="ml-3 font-semibold text-sm transition-colors hover:opacity-70">
                <span x-show="!copied">Copier</span>
                <span x-show="copied" class="flex items-center gap-1">
                  <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Copié !
                </span>
              </button>
            </div>
            <p class="mt-2 text-xs text-[var(--color-muted-foreground)]">
              Composez <strong>*155*1*1*00000000*montant#</strong> puis appuyez sur Appel
            </p>
          </div>
        </div>
      </div>

      {{-- Wave --}}
      <div class="payment-card group bg-[var(--color-card)] rounded-3xl p-8 border border-[var(--color-border)]
                   shadow-soft hover:shadow-glow hover:-translate-y-1 transition animate-fade-up"
           style="animation-delay: 160ms" x-data="{ copied: false }">
        <div class="flex items-start justify-between mb-6">
          <div>
            <h3 class="font-display text-2xl font-semibold">Wave</h3>
            <p class="mt-2 text-sm text-[var(--color-muted-foreground)]">
              Paiement mobile instantané
            </p>
          </div>
          <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
            <svg class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
            </svg>
          </div>
        </div>

        <div class="space-y-4">
          <div>
            <label class="text-xs font-semibold uppercase tracking-widest text-[var(--color-primary)]">
              Numéro de compte
            </label>
            <div class="mt-2 flex items-center justify-between p-4 bg-[var(--color-background)] rounded-xl border border-[var(--color-border)]">
              <code class="text-sm font-mono font-semibold text-[var(--color-deep)]">
                +225 XX XX XX XX
              </code>
              <button type="button"
                      @click="navigator.clipboard.writeText('+225 XX XX XX XX'); copied = true; setTimeout(() => copied = false, 2000)"
                      :class="copied ? 'text-green-600' : 'text-[var(--color-primary)]'"
                      class="ml-3 font-semibold text-sm transition-colors hover:opacity-70">
                <span x-show="!copied">Copier</span>
                <span x-show="copied" class="flex items-center gap-1">
                  <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Copié !
                </span>
              </button>
            </div>
            <p class="mt-2 text-xs text-[var(--color-muted-foreground)]">
              Accédez à Wave sur votre téléphone ou web et transférez directement
            </p>
          </div>
        </div>
      </div>

      {{-- PayPal --}}
      <div class="payment-card group bg-[var(--color-card)] rounded-3xl p-8 border border-[var(--color-border)]
                   shadow-soft hover:shadow-glow hover:-translate-y-1 transition animate-fade-up"
           style="animation-delay: 240ms" x-data="{ copied: false }">
        <div class="flex items-start justify-between mb-6">
          <div>
            <h3 class="font-display text-2xl font-semibold">PayPal</h3>
            <p class="mt-2 text-sm text-[var(--color-muted-foreground)]">
              Paiement sécurisé international
            </p>
          </div>
          <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center">
            <svg class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
            </svg>
          </div>
        </div>

        <div class="space-y-4">
          <div>
            <label class="text-xs font-semibold uppercase tracking-widest text-[var(--color-primary)]">
              Adresse email
            </label>
            <div class="mt-2 flex items-center justify-between p-4 bg-[var(--color-background)] rounded-xl border border-[var(--color-border)]">
              <code class="text-sm font-mono font-semibold text-[var(--color-deep)]">
                don@deme.org
              </code>
              <button type="button"
                      @click="navigator.clipboard.writeText('don@deme.org'); copied = true; setTimeout(() => copied = false, 2000)"
                      :class="copied ? 'text-green-600' : 'text-[var(--color-primary)]'"
                      class="ml-3 font-semibold text-sm transition-colors hover:opacity-70">
                <span x-show="!copied">Copier</span>
                <span x-show="copied" class="flex items-center gap-1">
                  <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  Copié !
                </span>
              </button>
            </div>
            <p class="mt-2 text-xs text-[var(--color-muted-foreground)]">
              Cliquez sur le lien PayPal et entrez cet email pour donner directement
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ══════════════════════════════════════════════════
     SECTION IMPACT
══════════════════════════════════════════════════ --}}
<section class="gradient-soft">
  <div class="container-page py-24">
    <div class="max-w-4xl mx-auto">
      {{-- En-tête --}}
      <div class="text-center mb-16 animate-fade-up">
        <span class="text-sm font-semibold uppercase tracking-widest text-[var(--color-primary)]">
          Votre impact
        </span>
        <h2 class="mt-3 text-3xl md:text-5xl font-bold leading-tight">
          Chaque don <span class="text-gradient">fait la différence</span>.
        </h2>
      </div>

      {{-- Statistiques d'impact --}}
      <div class="grid md:grid-cols-3 gap-6">

        <div class="group bg-[var(--color-card)] rounded-3xl p-8 border border-[var(--color-border)]
                    shadow-soft hover:shadow-glow transition animate-fade-up"
             style="animation-delay: 0ms">
          <div class="flex items-center gap-4 mb-4">
            <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-pink-100 to-pink-200
                        flex items-center justify-center text-pink-600">
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
              </svg>
            </div>
            <div class="text-3xl font-bold text-gradient">2 500+</div>
          </div>
          <h3 class="font-semibold text-lg">Jeunes filles accompagnées</h3>
          <p class="mt-2 text-sm text-[var(--color-muted-foreground)]">
            Sensibilisées, formées et soutenues dans leur parcours
          </p>
        </div>

        <div class="group bg-[var(--color-card)] rounded-3xl p-8 border border-[var(--color-border)]
                    shadow-soft hover:shadow-glow transition animate-fade-up"
             style="animation-delay: 80ms">
          <div class="flex items-center gap-4 mb-4">
            <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-blue-100 to-blue-200
                        flex items-center justify-center text-blue-600">
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M5 13c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-2H5v2zm7 4h2v-2h-2v2zm-7-4h2V7H5v6zm14 0h2V7h-2v6zM5 3h14c1.1 0 2 .9 2 2v14c0 1.1-.9 2-2 2H5c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2z"/>
              </svg>
            </div>
            <div class="text-3xl font-bold text-gradient">120</div>
          </div>
          <h3 class="font-semibold text-lg">Formations organisées</h3>
          <p class="mt-2 text-sm text-[var(--color-muted-foreground)]">
            Ateliers et sessions de sensibilisation chaque année
          </p>
        </div>

        <div class="group bg-[var(--color-card)] rounded-3xl p-8 border border-[var(--color-border)]
                    shadow-soft hover:shadow-glow transition animate-fade-up"
             style="animation-delay: 160ms">
          <div class="flex items-center gap-4 mb-4">
            <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-green-100 to-green-200
                        flex items-center justify-center text-green-600">
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2c5.33 4.55 8 8.48 8 11.8 0 4.98-3.8 8.2-8 8.2s-8-3.22-8-8.2c0-3.32 2.67-7.25 8-11.8m0-2C6.25 4.75 3 9.5 3 13.8c0 6.23 4.03 10.2 9 10.2s9-3.97 9-10.2c0-4.3-3.25-9.05-9-13.8z"/>
              </svg>
            </div>
            <div class="text-3xl font-bold text-gradient">45</div>
          </div>
          <h3 class="font-semibold text-lg">Campagnes réalisées</h3>
          <p class="mt-2 text-sm text-[var(--color-muted-foreground)]">
            Sensibilisations communautaires dans différentes régions
          </p>
        </div>

      </div>

      {{-- Message impact --}}
      <div class="mt-16 rounded-3xl bg-[var(--color-card)] border border-[var(--color-border)]
                  shadow-soft p-8 md:p-12 text-center animate-fade-up"
           style="animation-delay: 240ms">
        <p class="text-lg md:text-xl text-[var(--color-deep)] leading-relaxed">
          <strong>Votre don de 50 €</strong> peut :
        </p>
        <div class="mt-8 grid md:grid-cols-3 gap-6 text-left">
          <div class="flex gap-4">
            <div class="shrink-0">
              <div class="flex items-center justify-center h-8 w-8 rounded-full bg-[var(--color-primary)] text-white text-sm font-bold">
                1
              </div>
            </div>
            <p class="text-sm text-[var(--color-muted-foreground)]">
              <strong>Financer 2 sensibilisations</strong> auprès des jeunes filles
            </p>
          </div>
          <div class="flex gap-4">
            <div class="shrink-0">
              <div class="flex items-center justify-center h-8 w-8 rounded-full bg-[var(--color-primary)] text-white text-sm font-bold">
                2
              </div>
            </div>
            <p class="text-sm text-[var(--color-muted-foreground)]">
              <strong>Imprimer 100 brochures</strong> d'information et de prévention
            </p>
          </div>
          <div class="flex gap-4">
            <div class="shrink-0">
              <div class="flex items-center justify-center h-8 w-8 rounded-full bg-[var(--color-primary)] text-white text-sm font-bold">
                3
              </div>
            </div>
            <p class="text-sm text-[var(--color-muted-foreground)]">
              <strong>Équiper un atelier</strong> avec le matériel pédagogique
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ══════════════════════════════════════════════════
     SECTION REMERCIEMENTS
══════════════════════════════════════════════════ --}}
<section class="container-page py-24">
  <div class="max-w-3xl mx-auto text-center animate-fade-up">
    <svg class="h-16 w-16 mx-auto mb-6 text-[var(--color-secondary)] opacity-20" fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
    </svg>

    <h2 class="text-4xl md:text-5xl font-bold leading-tight">
      Merci d'être à nos côtés.
    </h2>

    <p class="mt-8 text-xl text-[var(--color-muted-foreground)] leading-relaxed max-w-2xl mx-auto">
      Votre générosité n'est pas juste un don financier. C'est un acte de solidarité,
      un engagement pour la dignité et l'autonomie des jeunes filles. Ensemble, nous créons
      le changement, un acte de compassion à la fois.
    </p>

    <div class="mt-10 pt-10 border-t border-[var(--color-border)]">
      <p class="text-sm text-[var(--color-muted-foreground)]">
        DÉMÉ est une association reconnue à but non lucratif. Votre don est entièrement
        utilisé pour financer nos actions. Merci pour votre confiance.
      </p>
    </div>

    <div class="mt-10 flex flex-wrap justify-center gap-4">
      <a href="{{ route('contact') }}"
         class="inline-flex items-center gap-2 text-[var(--color-primary)] font-semibold
                hover:gap-3 transition-all">
        Une question ? Contactez-nous
        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
        </svg>
      </a>
    </div>
  </div>
</section>

{{-- Alpine.js for copy functionality --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

@endsection
