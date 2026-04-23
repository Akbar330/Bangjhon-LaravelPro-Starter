<header class="relative z-10 border-b border-white/60 bg-white/55 px-4 py-4 shadow-sm backdrop-blur-xl sm:px-6 lg:px-10">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm font-medium uppercase tracking-[0.24em] text-slate-400">Workspace</p>
            <h2 class="mt-2 text-2xl font-semibold tracking-tight text-slate-950">@yield('page-title')</h2>
        </div>

        <div class="flex items-center gap-3">
            <div class="hidden rounded-2xl border border-white/70 bg-white/70 px-4 py-3 text-right shadow-sm sm:block">
                <p class="text-sm font-medium text-slate-500">Today</p>
                <p class="text-sm font-semibold text-slate-900">{{ now()->format('d M Y') }}</p>
            </div>

            <form action="{{ route('kaizen.logout') }}" method="POST">
                @csrf
                <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-slate-950 px-4 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-slate-800">
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>
