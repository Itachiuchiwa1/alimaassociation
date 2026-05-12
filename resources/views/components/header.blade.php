<header class="sticky top-0 z-50 backdrop-blur-xl bg-[var(--color-background)]/80 border-b border-[var(--color-border)]/60">
  <div class="container-page flex items-center justify-between py-3 h-18">

    {{-- Logo --}}
    <a href="{{ route('home') }}" class="flex items-center gap-3 group">
      <img style="width: 70px;height: 70px;" src="{{ asset('images/logo.jpeg') }}"
           alt="Logo DÉMÉ"
           class="h-11 w-11 rounded-full object-cover ring-2 ring-[var(--color-secondary)]/40 transition group-hover:ring-[var(--color-primary)]">
      <div class="leading-tight">
        <div class="font-display font-bold text-lg tracking-tight">DÉMÉ</div>
        <div class="text-[11px] text-[var(--color-muted-foreground)] -mt-0.5">Ne Laisse Personne Derrière</div>
      </div>
    </a>

    {{-- Navigation desktop --}}
    <nav class="hidden lg:flex items-center gap-1">
      @php
        $navLinks = [
          ['route' => 'home',     'label' => 'Accueil',     'exact' => true],
          ['route' => 'about',    'label' => 'À propos'],
          ['route' => 'actions',  'label' => 'Nos actions'],
          ['route' => 'gallery',  'label' => 'Galerie'],
          ['route' => 'blog',     'label' => 'Blog'],
          ['route' => 'contact',  'label' => 'Contact'],
        ];
      @endphp
      @foreach($navLinks as $link)
        <a href="{{ route($link['route']) }}"
           class="px-4 py-2 text-sm font-medium rounded-full transition
                  {{ request()->routeIs($link['route'])
                      ? 'text-[var(--color-primary)] bg-[var(--color-accent)]/80'
                      : 'text-[var(--color-foreground)]/80 hover:text-[var(--color-primary)] hover:bg-[var(--color-accent)]/60' }}">
          {{ $link['label'] }}
        </a>
      @endforeach
    </nav>

    {{-- CTA desktop --}}
    <div class="hidden lg:flex items-center gap-2">
      <a href="{{ route('donation') }}"
         class="inline-flex items-center gap-2 gradient-cta text-white font-semibold
                px-5 py-2.5 rounded-full shadow-soft hover:shadow-glow hover:-translate-y-0.5 transition">
        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                   2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09
                   C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5
                   c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
        </svg>
        Faire un don
      </a>
    </div>

    {{-- Burger mobile --}}
    <button id="mobile-menu-btn"
            type="button"
            aria-expanded="false"
            aria-label="Menu"
            class="lg:hidden p-2 rounded-md hover:bg-[var(--color-accent)]">
      <svg id="icon-menu-open" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <line x1="3" y1="6"  x2="21" y2="6"/>
        <line x1="3" y1="12" x2="21" y2="12"/>
        <line x1="3" y1="18" x2="21" y2="18"/>
      </svg>
      <svg id="icon-menu-close" class="h-5 w-5 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <line x1="18" y1="6"  x2="6"  y2="18"/>
        <line x1="6"  y1="6"  x2="18" y2="18"/>
      </svg>
    </button>
  </div>

  {{-- Menu mobile --}}
  <div id="mobile-menu"
       class="hidden lg:hidden border-t border-[var(--color-border)] bg-[var(--color-background)]">
    <div class="container-page py-4 flex flex-col gap-1">
      @foreach($navLinks as $link)
        <a href="{{ route($link['route']) }}"
           class="px-4 py-3 rounded-lg transition
                  {{ request()->routeIs($link['route'])
                      ? 'text-[var(--color-primary)] bg-[var(--color-accent)]/80'
                      : 'text-[var(--color-foreground)]/90 hover:bg-[var(--color-accent)]' }}">
          {{ $link['label'] }}
        </a>
      @endforeach
      <a href="{{ route('donation') }}"
         class="mt-2 gradient-cta text-white font-semibold px-5 py-3 rounded-full text-center">
        ❤ Faire un don
      </a>
    </div>
  </div>
</header>
