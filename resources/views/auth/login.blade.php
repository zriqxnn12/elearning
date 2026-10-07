<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} — Login</title>

        @fonts

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                body { background: #FDFDFC; color: #1b1b18; font-family: ui-sans-serif, system-ui, sans-serif; }
                .dark body { background: #0a0a0a; }
            </style>
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-sm">
            <div class="mb-6 text-center">
                <h1 class="text-2xl font-semibold">{{ config('app.name', 'Laravel') }}</h1>
                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mt-1">Sign in to your account</p>
            </div>

            <div class="bg-white dark:bg-[#161615] rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] p-6 sm:p-8">
                @if (session('status'))
                    <div class="mb-4 text-sm text-green-700 dark:text-green-400 bg-green-50 dark:bg-green-950/40 border border-green-200 dark:border-green-900 rounded-sm px-4 py-2">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 text-sm text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-950/40 border border-red-200 dark:border-red-900 rounded-sm px-4 py-2">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium mb-1.5">Email</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            class="w-full rounded-sm border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#161615] px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#f53003]/30"
                        >
                        @error('email')
                            <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium mb-1.5">Password</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="w-full rounded-sm border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#161615] px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#f53003]/30"
                        >
                        @error('password')
                            <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-2">
                        <input
                            id="remember"
                            type="checkbox"
                            name="remember"
                            class="rounded-sm border-[#e3e3e0] dark:border-[#3E3E3A] text-[#f53003] focus:ring-[#f53003]/30"
                        >
                        <label for="remember" class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Remember me</label>
                    </div>

                    <button
                        type="submit"
                        class="mt-1 w-full bg-[#1b1b18] dark:bg-[#EDEDEC] text-white dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white rounded-sm px-5 py-2 text-sm font-medium"
                    >
                        Log in
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>
