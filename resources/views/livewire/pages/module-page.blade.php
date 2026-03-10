<div class="space-y-6">
    <section class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm">
        <h1 class="text-2xl font-semibold tracking-tight text-zinc-900">
            {{ $title }}
        </h1>
        <p class="mt-2 text-sm text-zinc-600">
            Módulo base listo para extender con lógica de negocio, componentes Livewire y políticas de autorización.
        </p>
        <div class="mt-5 flex gap-3">
            <flux:button variant="primary">Crear registro</flux:button>
            <flux:button variant="ghost">Exportar</flux:button>
        </div>
    </section>

    <section class="grid gap-4 md:grid-cols-3">
        @foreach (['Resumen', 'Avance', 'Alertas'] as $card)
            <article class="rounded-xl border border-zinc-200 bg-white p-4">
                <h2 class="text-sm font-medium text-zinc-900">{{ $card }}</h2>
                <p class="mt-2 text-xs text-zinc-500">Componente placeholder para panel del módulo.</p>
            </article>
        @endforeach
    </section>
</div>
