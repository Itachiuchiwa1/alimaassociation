<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="@yield('description', 'Association caritative engagée pour le bien-être et la santé sexuelle des jeunes filles. Sensibiliser, former, accompagner.')">
  <meta name="author" content="Association DÉMÉ">
  <meta property="og:title"       content="@yield('title', 'DÉMÉ — Ne Laisse Personne Derrière')">
  <meta property="og:description" content="@yield('description', 'DÉMÉ accompagne les jeunes filles.')">
  <meta property="og:type"        content="website">

  <title>@yield('title', 'DÉMÉ — Ne Laisse Personne Derrière')</title>

  {{-- Vite compile CSS + JS --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased min-h-screen flex flex-col">

  {{-- Flash success --}}
  @if(session('success'))
    <div class="flash-msg fixed top-20 right-4 z-[200] max-w-sm rounded-2xl bg-green-500
                text-white px-6 py-4 shadow-lg flex items-center gap-3 transition-opacity duration-400">
      <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <polyline points="20 6 9 17 4 12"/>
      </svg>
      <span>{{ session('success') }}</span>
    </div>
  @endif

  @if(session('error'))
    <div class="flash-msg fixed top-20 right-4 z-[200] max-w-sm rounded-2xl bg-red-500
                text-white px-6 py-4 shadow-lg flex items-center gap-3 transition-opacity duration-400">
      <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
      </svg>
      <span>{{ session('error') }}</span>
    </div>
  @endif

  @include('components.header')

  <main class="flex-1">
    @yield('content')
  </main>

  @include('components.footer')

</body>
</html>
