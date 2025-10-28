<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="/favicon.svg" type="image/svg+xml">

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky collapsible="mobile" class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.header>
            <flux:sidebar.brand
                href="/"
                logo="https://fluxui.dev/img/demo/logo.png"
                logo:dark="https://fluxui.dev/img/demo/dark-mode-logo.png"
                name="Kassabuch"
            />

            <flux:sidebar.collapse class="lg:hidden" />
        </flux:sidebar.header>

        <flux:sidebar.nav>
            <flux:sidebar.item icon="arrows-right-left" href="{{route('home')}}" >Transaktionen</flux:sidebar.item>
            <flux:sidebar.item icon="tag" href="{{route('category_management')}}" >Kategorienverwaltung</flux:sidebar.item>
            <flux:sidebar.item icon="chart-pie" href="{{route('statistics')}}" >Statistken</flux:sidebar.item>
        </flux:sidebar.nav>

        <flux:sidebar.spacer />



    </flux:sidebar>

    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

    </flux:header>

    <flux:main>
         {{$slot}}
    </flux:main>
    @livewireScripts
    @fluxScripts
    </body>
</html>
