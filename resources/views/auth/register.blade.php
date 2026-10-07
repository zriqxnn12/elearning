<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} — Register</title>

        @fonts

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                body { background: #FDFDFC; color: #1b1b18; font-family: ui-sans-serif, system-ui, sans-serif; }
            </style>
        @endif
    </head>
    <body class="bg-[#FDFDFC] text-[#1b1b18] min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-sm">
            <div class="mb-6 text-center">
                <h1 class="text-2xl font-semibold">{{ config('app.name', 'Laravel') }}</h1>
                <p class="text-sm text-[#706f6c] mt-1">Create your account</p>
            </div>

            <div class="bg-white rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] p-6 sm:p-8">
                @if ($errors->any())
                    <div class="mb-4 text-sm text-red-600 bg-red-50 border border-red-200 rounded-sm px-4 py-2">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium mb-1.5">Name</label>
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            class="w-full rounded-sm border border-[#e3e3e0] bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#f53003]/30"
                        >
                        @error('name')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium mb-1.5">Email</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            class="w-full rounded-sm border border-[#e3e3e0] bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#f53003]/30"
                        >
                        @error('email')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium mb-1.5">Password</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            class="w-full rounded-sm border border-[#e3e3e0] bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#f53003]/30"
                        >
                        @error('password')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium mb-1.5">Confirm Password</label>
                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            class="w-full rounded-sm border border-[#e3e3e0] bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#f53003]/30"
                        >
                    </div>

                    <button
                        type="submit"
                        class="mt-1 w-full bg-[#1b1b18] text-white hover:bg-black rounded-sm px-5 py-2 text-sm font-medium"
                    >
                        Register
                    </button>
                </form>

                <p class="mt-4 text-center text-sm text-[#706f6c]">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-medium text-[#f53003] hover:underline">Log in</a>
                </p>
            </div>
        </div>
    </body>
</html>
