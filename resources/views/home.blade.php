<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <main>
        <div class="min-vh-100 flex h-screen flex-col justify-between">
            <div class="h-full bg-gradient-to-br from-blue-500 to-blue-700 px-4 py-20 text-white sm:px-6 lg:px-8">
                <div class="relative mx-auto flex h-full max-w-7xl items-center">
                    <div class="flex flex-col items-center justify-between lg:flex-row-reverse">
                        <img class="absolute top-0 w-2/3 lg:relative lg:w-[500px]" src="{{ asset('boxes.png') }}">
                        <div class="z-10">
                            <h1 class="mb-6 text-3xl font-bold leading-tight drop-shadow-lg lg:text-6xl">
                                Manage Your Warehouse Efficiently
                            </h1>
                            <p class="mb-8 text-lg leading-relaxed lg:text-xl">
                                Simplify inventory tracking, optimize space utilization, and streamline operations with
                                our advanced warehouse management solutions.
                            </p>
                            <a class="inline-block rounded-md bg-white px-8 py-3 font-bold text-blue-500 transition duration-300 ease-in-out hover:bg-slate-100 hover:text-blue-600 hover:shadow"
                                href="{{ route('filament.admin.auth.login') }}">
                                Access Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
