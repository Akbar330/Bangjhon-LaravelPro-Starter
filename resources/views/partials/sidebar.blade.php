@php($user = auth()->user())

<aside class="fixed inset-y-0 left-0 z-20 hidden w-80 border-r border-white/60 bg-white/70 px-6 py-8 shadow-[0_18px_60px_rgba(15,23,42,0.08)] backdrop-blur-xl lg:block">
    <div class="flex h-full flex-col">
        <div>
            <p class="text-sm font-medium uppercase tracking-[0.24em] text-sky-600">Kaizen</p>
            <h1 class="mt-3 text-2xl font-semibold tracking-tight text-slate-950">{{ config('kaizen-pro-starter.brand.name') }}</h1>
            <p class="mt-2 text-sm leading-6 text-slate-500">Starter UI designed for modern teams and internal products.</p>
        </div>

        <nav class="mt-10 space-y-2">
            <a href="{{ route('kaizen.dashboard') }}" class="kaizen-nav-link {{ request()->routeIs('kaizen.dashboard') ? 'is-active' : '' }}">
                User dashboard
            </a>

            @if (($user->role ?? 'user') === 'admin')
                <a href="{{ route('kaizen.admin.dashboard') }}" class="kaizen-nav-link {{ request()->routeIs('kaizen.admin.dashboard') ? 'is-active' : '' }}">
                    Admin dashboard
                </a>
                <a href="{{ route('kaizen.admin.users') }}" class="kaizen-nav-link {{ request()->routeIs('kaizen.admin.users') ? 'is-active' : '' }}">
                    User management
                </a>
            @endif
        </nav>

        <div class="mt-auto rounded-[28px] border border-white/70 bg-slate-900 px-5 py-6 text-white shadow-[0_18px_60px_rgba(15,23,42,0.24)]">
            <p class="text-sm font-medium text-slate-300">Signed in as</p>
            <p class="mt-2 text-xl font-semibold">{{ $user->name }}</p>
            <p class="mt-1 text-sm text-slate-300">{{ $user->email }}</p>
            <p class="mt-5 inline-flex rounded-full bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-slate-100">
                {{ $user->role }}
            </p>
        </div>
    </div>
</aside>
