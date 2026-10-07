<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard — {{ config('app.name', 'Laravel') }}</title>

        @fonts

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] min-h-screen">
        <div class="max-w-4xl mx-auto p-6 lg:p-8">
            <header class="flex items-center justify-between mb-8">
                <h1 class="text-xl font-semibold">{{ config('app.name', 'Laravel') }}</h1>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="inline-block px-5 py-1.5 border border-[#19140035] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] rounded-sm text-sm"
                    >
                        Log out
                    </button>
                </form>
            </header>

            <main class="bg-white dark:bg-[#161615] rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] p-6 sm:p-8">
                <h2 class="mb-1 font-medium">Welcome back, {{ Auth::user()->name }}</h2>
                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ Auth::user()->email }}</p>
            </main>
        </div>
    </body>
</html>
