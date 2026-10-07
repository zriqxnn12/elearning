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
    <body class="bg-[#FDFDFC] text-[#1b1b18] min-h-screen">
        <div class="max-w-4xl mx-auto p-6 lg:p-8">
            <header class="flex items-center justify-between mb-8">
                <h1 class="text-xl font-semibold">{{ config('app.name', 'Laravel') }}</h1>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="inline-block px-5 py-1.5 border border-[#19140035] hover:border-[#1915014a] rounded-sm text-sm"
                    >
                        Log out
                    </button>
                </form>
            </header>

            <main class="flex flex-col gap-6">
                <section class="bg-white rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] p-6 sm:p-8">
                    <h2 class="mb-1 font-medium">Welcome back, {{ Auth::user()->name }}</h2>
                    <p class="text-sm text-[#706f6c]">{{ Auth::user()->email }}</p>
                </section>

                <section class="grid gap-4 sm:grid-cols-3">
                    <div class="bg-white rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] p-6">
                        <h3 class="text-sm font-medium mb-1">My Courses</h3>
                        <p class="text-2xl font-semibold">0</p>
                        <p class="text-xs text-[#706f6c] mt-1">Courses you are enrolled in</p>
                    </div>

                    <div class="bg-white rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] p-6">
                        <h3 class="text-sm font-medium mb-1">Lessons Completed</h3>
                        <p class="text-2xl font-semibold">0</p>
                        <p class="text-xs text-[#706f6c] mt-1">Total finished lessons</p>
                    </div>

                    <div class="bg-white rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] p-6">
                        <h3 class="text-sm font-medium mb-1">Progress</h3>
                        <p class="text-2xl font-semibold">0%</p>
                        <p class="text-xs text-[#706f6c] mt-1">Overall learning progress</p>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
