@extends('kaizen-pro-starter::layouts.app')

@section('page-title', 'User Dashboard')

@section('content')
    <section class="grid gap-4 md:grid-cols-3">
        @foreach ($stats as $stat)
            @include('kaizen-pro-starter::components.stat-card', $stat)
        @endforeach
    </section>

    <section class="grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
        <div class="kaizen-glass-panel rounded-[30px] p-6 shadow-[0_18px_60px_rgba(15,23,42,0.08)]">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-sm font-medium uppercase tracking-[0.24em] text-slate-400">Overview</p>
                    <h3 class="mt-2 text-2xl font-semibold tracking-tight text-slate-950">Your starter workspace is live</h3>
                </div>
                <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">User</span>
            </div>

            <div class="mt-8 grid gap-4 md:grid-cols-2">
                <div class="rounded-[24px] bg-slate-950 p-5 text-white">
                    <p class="text-sm font-medium text-slate-300">Welcome back</p>
                    <p class="mt-3 text-2xl font-semibold">{{ $user->name }}</p>
                    <p class="mt-2 text-sm leading-6 text-slate-300">Your account is configured with role-based access and premium starter views out of the box.</p>
                </div>
                <div class="rounded-[24px] border border-slate-200 bg-white/70 p-5">
                    <p class="text-sm font-medium text-slate-500">Quick actions</p>
                    <div class="mt-4 space-y-3 text-sm text-slate-600">
                        <p class="rounded-2xl bg-slate-50 px-4 py-3">Explore your activity feed and published package views.</p>
                        <p class="rounded-2xl bg-slate-50 px-4 py-3">Customize the UI by editing the vendor-published Blade files.</p>
                        <p class="rounded-2xl bg-slate-50 px-4 py-3">Protect custom routes with `kaizen.role` middleware.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="kaizen-glass-panel rounded-[30px] p-6 shadow-[0_18px_60px_rgba(15,23,42,0.08)]">
            <p class="text-sm font-medium uppercase tracking-[0.24em] text-slate-400">Recent Activity</p>
            <div class="mt-6 space-y-4">
                @forelse ($recentActivity as $activity)
                    <div class="rounded-[24px] border border-slate-200 bg-white/80 p-4">
                        <p class="text-sm font-semibold text-slate-900">{{ $activity->description }}</p>
                        <p class="mt-2 text-xs uppercase tracking-[0.18em] text-slate-400">{{ $activity->type }}</p>
                    </div>
                @empty
                    <div class="rounded-[24px] border border-dashed border-slate-300 bg-white/70 p-5 text-sm leading-6 text-slate-500">
                        Activity will appear here as users sign in, register, and interact with your app.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
