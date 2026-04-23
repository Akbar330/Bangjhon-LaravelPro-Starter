<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('bangjhon-pro-starter.brand.name') }}</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui']
                    },
                    colors: {
                        bangjhon: {
                            ink: '#0f172a',
                            mist: '#e2e8f0',
                            sky: '#38bdf8',
                            gold: '#f59e0b'
                        }
                    }
                }
            }
        };
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bangjhon/laravel-pro-starter/pro-starter.css') }}">
</head>
<body class="min-h-screen bg-[#f4f7fb] font-sans text-slate-900 antialiased">
    <div class="relative isolate min-h-screen overflow-hidden px-4 py-6 sm:px-6 lg:px-8">
        <div class="kaizen-bg-orb kaizen-bg-orb-left"></div>
        <div class="kaizen-bg-orb kaizen-bg-orb-right"></div>

        <div class="mx-auto grid min-h-[calc(100vh-3rem)] max-w-6xl items-center gap-8 lg:grid-cols-[1.1fr_0.9fr]">
            <div class="hidden lg:block">
                <div class="max-w-xl">
                    <span class="inline-flex rounded-full border border-white/60 bg-white/70 px-4 py-2 text-sm font-medium text-slate-600 shadow-sm backdrop-blur">
                        Laravel 10+ starter package
                    </span>
                    <h1 class="mt-6 text-5xl font-semibold leading-tight tracking-tight text-slate-950">
                        Launch polished auth and dashboards without settling for starter-kit basics.
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-slate-600">
                        {{ config('bangjhon-pro-starter.brand.tagline') }}
                    </p>
                    <div class="mt-10 grid gap-4 sm:grid-cols-2">
                        <div class="kaizen-glass-panel rounded-[28px] p-5">
                            <p class="text-sm font-medium text-slate-500">Built in</p>
                            <p class="mt-2 text-2xl font-semibold text-slate-900">Custom auth</p>
                            <p class="mt-2 text-sm leading-6 text-slate-600">Registration, login, logout, remember me, and role-aware redirects.</p>
                        </div>
                        <div class="kaizen-glass-panel rounded-[28px] p-5">
                            <p class="text-sm font-medium text-slate-500">Ready for teams</p>
                            <p class="mt-2 text-2xl font-semibold text-slate-900">Admin + user</p>
                            <p class="mt-2 text-sm leading-6 text-slate-600">Structured dashboards, activity insights, and responsive navigation.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="kaizen-glass-panel mx-auto w-full max-w-lg rounded-[32px] p-6 shadow-[0_24px_80px_rgba(15,23,42,0.14)] sm:p-8">
                <div class="mb-8">
                    <p class="text-sm font-medium uppercase tracking-[0.24em] text-sky-600">Bangjhon Pro Starter</p>
                    <h2 class="mt-3 text-3xl font-semibold tracking-tight text-slate-950">@yield('title')</h2>
                    <p class="mt-3 text-sm leading-6 text-slate-500">@yield('subtitle')</p>
                </div>

                <div class="space-y-4">
                    @include('bangjhon-pro-starter::components.flash')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
