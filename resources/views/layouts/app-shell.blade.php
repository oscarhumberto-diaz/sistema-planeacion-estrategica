<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full" x-data="{ dark: localStorage.getItem('dark') === 'true' }" x-init="$watch('dark', value => localStorage.setItem('dark', value)); if (dark) document.documentElement.classList.add('dark')" :class="dark ? 'dark' : ''">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name', 'Planeación Estratégica') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxStyles
    @livewireStyles
</head>

<body class="h-full bg-zinc-50 text-zinc-900 dark:bg-zinc-950 dark:text-zinc-100" x-data="{ sidebarOpen: true }">
    <div class="flex min-h-screen">
        <aside :class="sidebarOpen ? 'w-72' : 'w-20'" class="hidden border-r border-zinc-200 bg-white p-3 transition-all dark:border-zinc-800 dark:bg-zinc-900 lg:block">
            <div class="mb-4 flex items-center justify-between">
                <span class="text-sm font-semibold" x-show="sidebarOpen">BSC Universidad</span>
                <flux:button size="sm" variant="ghost" @click="sidebarOpen = !sidebarOpen">☰</flux:button>
            </div>
            <nav class="space-y-1">
                @foreach ($navigationItems as $item)
                    <a href="{{ route($item['route']) }}"
                        class="flex items-center rounded-lg px-3 py-2 text-sm font-medium hover:bg-zinc-100 dark:hover:bg-zinc-800 {{ request()->routeIs($item['route']) ? 'bg-zinc-100 dark:bg-zinc-800' : '' }}">
                        <span x-show="sidebarOpen">{{ $item['label'] }}</span>
                        <span x-show="!sidebarOpen">•</span>
                    </a>
                @endforeach
            </nav>
        </aside>

        <div class="flex min-w-0 flex-1 flex-col">
            <header class="sticky top-0 z-20 border-b border-zinc-200 bg-white/80 px-4 py-3 backdrop-blur dark:border-zinc-800 dark:bg-zinc-900/80 lg:px-6">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h1 class="text-base font-semibold">{{ $title ?? 'Panel' }}</h1>
                        <ol class="mt-1 flex flex-wrap items-center gap-1 text-xs text-zinc-500 dark:text-zinc-400">
                            @foreach ($breadcrumbs ?? [] as $crumb)
                                <li>{{ $crumb['label'] }}</li>
                                @if (! $loop->last)
                                    <li>/</li>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                    <div class="flex items-center gap-2">
                        <flux:button size="sm" variant="ghost" @click="dark = !dark; document.documentElement.classList.toggle('dark')">
                            <span x-text="dark ? 'Claro' : 'Oscuro'"></span>
                        </flux:button>
                        <flux:button size="sm" variant="primary">Perfil</flux:button>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-4 lg:p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

    @fluxScripts
    @livewireScripts
</body>

</html>
