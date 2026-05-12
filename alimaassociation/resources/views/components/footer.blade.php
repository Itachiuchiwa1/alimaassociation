<footer class="bg-[var(--color-deep)] text-[var(--color-deep-foreground)] mt-24">
  <div class="container-page py-16 grid gap-10 md:grid-cols-4">

    {{-- Colonne marque --}}
    <div class="md:col-span-2">
      <div class="flex items-center gap-3 mb-4">
        <img src="{{ asset('assets/images/logo-deme.jpg') }}"
             alt="DÉMÉ"
             class="h-12 w-12 rounded-full object-cover">
        <div>
          <div class="font-display text-xl font-bold">DÉMÉ</div>
          <div class="text-sm opacity-70">Ne Laisse Personne Derrière</div>
        </div>
      </div>
      <p class="text-sm opacity-80 max-w-md leading-relaxed">
        Association caritative engagée pour le bien-être et la santé sexuelle des jeunes filles.
        Sensibiliser, former, accompagner — pour qu'aucune fille ne reste derrière.
      </p>
      <div class="flex gap-3 mt-5">
        {{-- Facebook --}}
        <a href="#" class="p-2 rounded-full bg-white/10 hover:bg-[var(--color-secondary)] hover:text-[var(--color-deep)] transition">
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
          </svg>
        </a>
        {{-- Instagram --}}
        <a href="#" class="p-2 rounded-full bg-white/10 hover:bg-[var(--color-secondary)] hover:text-[var(--color-deep)] transition">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
            <circle cx="12" cy="12" r="4"/>
            <circle cx="17.5" cy="6.5" r="0.5" fill="currentColor"/>
          </svg>
        </a>
        {{-- Mail --}}
        <a href="mailto:contact@deme.org"
           class="p-2 rounded-full bg-white/10 hover:bg-[var(--color-secondary)] hover:text-[var(--color-deep)] transition">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
            <polyline points="22,6 12,13 2,6"/>
          </svg>
        </a>
      </div>
    </div>

    {{-- Navigation --}}
    <div>
      <h4 class="font-semibold mb-4 text-[var(--color-secondary)]">Navigation</h4>
      <ul class="space-y-2 text-sm opacity-80">
        @foreach([
          ['route' => 'about',    'label' => 'À propos'],
          ['route' => 'actions',  'label' => 'Nos actions'],
          ['route' => 'gallery',  'label' => 'Galerie'],
          ['route' => 'blog',     'label' => 'Blog'],
          ['route' => 'donation', 'label' => 'Faire un don'],
        ] as $link)
          <li>
            <a href="{{ route($link['route']) }}"
               class="hover:text-[var(--color-secondary)] transition">
              {{ $link['label'] }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>

    {{-- Contact --}}
    <div>
      <h4 class="font-semibold mb-4 text-[var(--color-secondary)]">Contact</h4>
      <ul class="space-y-3 text-sm opacity-80">
        <li class="flex gap-2 items-start">
          <svg class="h-4 w-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
            <circle cx="12" cy="10" r="3"/>
          </svg>
          Siège — à compléter
        </li>
        <li class="flex gap-2 items-start">
          <svg class="h-4 w-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07
                     A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.62 2h3
                     a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91
                     a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45
                     c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
          </svg>
          +000 00 00 00 00
        </li>
        <li class="flex gap-2 items-start">
          <svg class="h-4 w-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
            <polyline points="22,6 12,13 2,6"/>
          </svg>
          contact@deme.org
        </li>
      </ul>
    </div>

  </div>

  <div class="border-t border-white/10">
    <div class="container-page py-5 text-xs opacity-60 flex flex-wrap justify-between gap-2">
      <span>© {{ date('Y') }} DÉMÉ — Tous droits réservés.</span>
      <span>Avec ❤ pour chaque jeune fille.</span>
    </div>
  </div>
</footer>
