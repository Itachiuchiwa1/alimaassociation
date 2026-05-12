@extends('layouts.app')
@section('title',       'Nos actions — DÉMÉ')
@section('description', 'Sensibilisations, ateliers, formations, accompagnement et campagnes communautaires.')

@section('content')

{{-- En-tête --}}
<section class="gradient-soft">
  <div class="container-page py-20 md:py-28 text-center max-w-3xl mx-auto animate-fade-up">
    <span class="text-sm font-semibold uppercase tracking-widest text-[var(--color-primary)]">Nos actions</span>
    <h1 class="mt-3 text-4xl md:text-6xl font-bold leading-tight">
      Sur le <span class="text-gradient">terrain</span>, chaque jour.
    </h1>
    <p class="mt-5 text-[var(--color-muted-foreground)] text-lg">
      Découvrez les programmes qui changent concrètement la vie des jeunes filles.
    </p>
  </div>
</section>

{{-- Grille d'actions --}}
<section class="container-page py-20 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
  @forelse($actions as $i => $action)
    <article class="group bg-[var(--color-card)] rounded-3xl overflow-hidden border border-[var(--color-border)]
                    shadow-soft hover:shadow-glow hover:-translate-y-1 transition animate-fade-up"
             style="animation-delay: {{ $i * 80 }}ms">
      <div class="aspect-[4/3] overflow-hidden relative">
        <img src="{{ $action->image_url }}"
             alt="{{ $action->title }}" loading="lazy"
             class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
        {{-- Badge icône --}}
        <div class="absolute top-3 left-3 p-2.5 rounded-xl bg-white/90 backdrop-blur text-[var(--color-primary)]">
          @include('components.icon-svg', ['icon' => $action->icon, 'class' => 'h-4 w-4'])
        </div>
      </div>
      <div class="p-6">
        <h3 class="font-display font-semibold text-xl">{{ $action->title }}</h3>
        <p class="mt-2 text-sm text-[var(--color-muted-foreground)] leading-relaxed">{{ $action->description }}</p>
      </div>
    </article>
  @empty
    <div class="col-span-full text-center py-12">
      <p class="text-[var(--color-muted-foreground)]">Aucune action disponible pour le moment.</p>
    </div>
  @endforelse
</section>

@endsection
