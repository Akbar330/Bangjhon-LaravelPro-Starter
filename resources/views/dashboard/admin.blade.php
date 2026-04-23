@extends('bangjhon-pro-starter::layouts.app')

@section('page-title', 'Admin Dashboard')

@section('content')
    <section class="grid gap-4 md:grid-cols-2 2xl:grid-cols-4">
        @foreach ($stats as $stat)
            @include('bangjhon-pro-starter::components.stat-card', $stat)
        @endforeach
    </section>

    <section class="grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
        <div class="kaizen-glass-panel rounded-[30px] p-6 shadow-[0_18px_60px_rgba(15,23,42,0.08)]">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-sm font-medium uppercase tracking-[0.24em] text-slate-400">Latest users</p>
                    <h3 class="mt-2 text-2xl font-semibold tracking-tight text-slate-950">Team growth at a glance</h3>
                </div>
                <a href="{{ route('bangjhon.admin.users') }}" class="rounded-2xl bg-slate-950 px-4 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-slate-800">
                    View all users
                </a>
            </div>

            <div class="mt-6 overflow-hidden rounded-[26px] border border-slate-200 bg-white/80">
                <table class="min-w-full divide-y divide-slate-200 text-left">
                    <thead class="bg-slate-50/80 text-xs uppercase tracking-[0.18em] text-slate-500">
                        <tr>
                            <th class="px-5 py-4">Name</th>
                            <th class="px-5 py-4">Role</th>
                            <th class="px-5 py-4">Joined</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                        @foreach ($recentUsers as $recentUser)
                            <tr>
                                <td class="px-5 py-4">
                                    <p class="font-semibold text-slate-900">{{ $recentUser->name }}</p>
                                    <p class="mt-1 text-xs text-slate-500">{{ $recentUser->email }}</p>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="rounded-full px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] {{ $recentUser->role === 'admin' ? 'bg-slate-900 text-white' : 'bg-sky-100 text-sky-700' }}">
                                        {{ $recentUser->role }}
                                    </span>
                                </td>
                                <td class="px-5 py-4">{{ $recentUser->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="kaizen-glass-panel rounded-[30px] p-6 shadow-[0_18px_60px_rgba(15,23,42,0.08)]">
            <p class="text-sm font-medium uppercase tracking-[0.24em] text-slate-400">Activity stream</p>
            <div class="mt-6 space-y-4">
                @forelse ($recentActivity as $activity)
                    <div class="rounded-[24px] border border-slate-200 bg-white/80 p-4">
                        <div class="flex items-center justify-between gap-4">
                            <p class="text-sm font-semibold text-slate-900">{{ $activity->description }}</p>
                            <span class="text-xs uppercase tracking-[0.18em] text-slate-400">{{ $activity->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="mt-2 text-xs uppercase tracking-[0.18em] text-slate-400">{{ $activity->type }}</p>
                    </div>
                @empty
                    <div class="rounded-[24px] border border-dashed border-slate-300 bg-white/70 p-5 text-sm leading-6 text-slate-500">
                        Activity entries will populate as your users authenticate and the installer provisions the admin account.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
