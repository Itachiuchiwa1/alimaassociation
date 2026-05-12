<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin') — DÉMÉ</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
  <div class="flex min-h-screen">
    {{-- Sidebar --}}
    <aside class="w-64 bg-[var(--color-deep)] text-[var(--color-deep-foreground)] shadow-lg">
      <div class="p-6 border-b border-white/10">
        <h1 class="font-display text-2xl font-bold text-[var(--color-secondary)]">DÉMÉ Admin</h1>
      </div>

      <nav class="p-4 space-y-2">
        <a href="{{ route('admin.settings.index') }}"
           class="block px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.settings.*') ? 'bg-white/15' : 'hover:bg-white/5' }} transition">
          ⚙️ Paramètres
        </a>
        <a href="{{ route('admin.actions.index') }}"
           class="block px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.actions.*') ? 'bg-white/15' : 'hover:bg-white/5' }} transition">
          📋 Actions
        </a>
        <a href="{{ route('admin.blog-categories.index') }}"
           class="block px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.blog-categories.*') ? 'bg-white/15' : 'hover:bg-white/5' }} transition">
          🏷️ Catégories Blog
        </a>
        <a href="{{ route('admin.blog-posts.index') }}"
           class="block px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.blog-posts.*') ? 'bg-white/15' : 'hover:bg-white/5' }} transition">
          📝 Articles
        </a>
        <a href="{{ route('admin.gallery-categories.index') }}"
           class="block px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.gallery-categories.*') ? 'bg-white/15' : 'hover:bg-white/5' }} transition">
          🏷️ Catégories Galerie
        </a>
        <a href="{{ route('admin.gallery-images.index') }}"
           class="block px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.gallery-images.*') ? 'bg-white/15' : 'hover:bg-white/5' }} transition">
          🖼️ Images Galerie
        </a>
        <a href="{{ route('admin.contacts.index') }}"
           class="block px-4 py-2.5 rounded-lg {{ request()->routeIs('admin.contacts.*') ? 'bg-white/15' : 'hover:bg-white/5' }} transition">
          💬 Contacts
        </a>
      </nav>

      <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/10">
        <a href="{{ route('home') }}"
           class="block px-4 py-2.5 text-center rounded-lg bg-white/10 hover:bg-white/15 transition">
          ← Retour au site
        </a>
      </div>
    </aside>

    {{-- Main content --}}
    <main class="flex-1 overflow-auto">
      <div class="p-8">
        {{-- Messages de succès/erreur --}}
        @if(session('success'))
          <div class="mb-4 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
            ✓ {{ session('success') }}
          </div>
        @endif

        @if(session('error'))
          <div class="mb-4 rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3">
            ✗ {{ session('error') }}
          </div>
        @endif

        {{-- Erreurs de validation --}}
        @if($errors->any())
          <div class="mb-4 rounded-lg bg-red-50 border border-red-200 p-4">
            <p class="font-semibold text-red-800 mb-2">Erreurs de validation :</p>
            <ul class="text-sm text-red-700 space-y-1">
              @foreach($errors->all() as $error)
                <li>• {{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        @yield('content')
      </div>
    </main>
  </div>
</body>
</html>
