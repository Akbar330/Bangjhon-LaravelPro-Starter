<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('kaizen-pro-starter.brand.name') }}</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui']
                    }
                }
            }
        };
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/kaizen/laravel-pro-starter/pro-starter.css') }}">
</head>
<body class="min-h-screen bg-[#eef3f8] font-sans text-slate-900 antialiased">
    <div class="relative flex min-h-screen overflow-hidden">
        <div class="kaizen-dashboard-orb kaizen-dashboard-orb-a"></div>
        <div class="kaizen-dashboard-orb kaizen-dashboard-orb-b"></div>

        @include('kaizen-pro-starter::partials.sidebar')

        <div class="relative z-10 flex min-h-screen flex-1 flex-col lg:pl-80">
            @include('kaizen-pro-starter::partials.topbar')

            <main class="flex-1 px-4 pb-8 pt-6 sm:px-6 lg:px-10">
                <div class="space-y-6">
                    @include('kaizen-pro-starter::components.flash')
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
