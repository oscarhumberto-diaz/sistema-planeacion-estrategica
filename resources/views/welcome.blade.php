<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Sistema de Planeación Estratégica') }}</title>
        @vite(['resources/css/app.css'])
    </head>
    <body class="min-h-screen bg-zinc-100 text-zinc-900 antialiased">
        <main class="mx-auto flex min-h-screen w-full max-w-5xl flex-col justify-center px-6 py-12">
            <div class="rounded-2xl border border-zinc-200 bg-white p-8 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-wide text-zinc-500">Universidad</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight">Sistema de Planeación Estratégica</h1>
                <p class="mt-4 max-w-2xl text-zinc-600">
                    Plataforma para gestionar objetivos, indicadores, metas e iniciativas institucionales desde un tablero centralizado.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center rounded-lg bg-zinc-900 px-4 py-2 text-sm font-medium text-white hover:bg-zinc-800">
                            Ir al dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center rounded-lg bg-zinc-900 px-4 py-2 text-sm font-medium text-white hover:bg-zinc-800">
                            Iniciar sesión
                        </a>
                    @endauth
                </div>
            </div>
        </main>
    </body>
</html>
