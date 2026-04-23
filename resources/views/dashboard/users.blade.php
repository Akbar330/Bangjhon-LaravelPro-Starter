@extends('kaizen-pro-starter::layouts.app')

@section('page-title', 'User Management')

@section('content')
    <section class="kaizen-glass-panel rounded-[30px] p-6 shadow-[0_18px_60px_rgba(15,23,42,0.08)]">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-medium uppercase tracking-[0.24em] text-slate-400">Directory</p>
                <h3 class="mt-2 text-2xl font-semibold tracking-tight text-slate-950">All registered users</h3>
            </div>
            <p class="text-sm leading-6 text-slate-500">A clean starter table you can extend for invitations, permissions, or audits.</p>
        </div>

        <div class="mt-6 overflow-hidden rounded-[26px] border border-slate-200 bg-white/80">
            <table class="min-w-full divide-y divide-slate-200 text-left">
                <thead class="bg-slate-50/80 text-xs uppercase tracking-[0.18em] text-slate-500">
                    <tr>
                        <th class="px-5 py-4">Name</th>
                        <th class="px-5 py-4">Email</th>
                        <th class="px-5 py-4">Role</th>
                        <th class="px-5 py-4">Joined</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    @foreach ($users as $listedUser)
                        <tr>
                            <td class="px-5 py-4 font-semibold text-slate-900">{{ $listedUser->name }}</td>
                            <td class="px-5 py-4">{{ $listedUser->email }}</td>
                            <td class="px-5 py-4">
                                <span class="rounded-full px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] {{ $listedUser->role === 'admin' ? 'bg-slate-900 text-white' : 'bg-sky-100 text-sky-700' }}">
                                    {{ $listedUser->role }}
                                </span>
                            </td>
                            <td class="px-5 py-4">{{ $listedUser->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </section>
@endsection
