@extends('kaizen-pro-starter::layouts.guest')

@section('title', 'Welcome back')
@section('subtitle', 'Sign in to access your workspace, recent activity, and role-based dashboard.')

@section('content')
    <form action="{{ route('kaizen.login.attempt') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="mb-2 block text-sm font-medium text-slate-700">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full rounded-2xl border-white/70 bg-white/70 px-4 py-3 text-slate-900 shadow-sm ring-0 backdrop-blur placeholder:text-slate-400 focus:border-sky-400 focus:ring-sky-400">
        </div>

        <div>
            <label for="password" class="mb-2 block text-sm font-medium text-slate-700">Password</label>
            <input id="password" type="password" name="password" required class="w-full rounded-2xl border-white/70 bg-white/70 px-4 py-3 text-slate-900 shadow-sm ring-0 backdrop-blur placeholder:text-slate-400 focus:border-sky-400 focus:ring-sky-400">
        </div>

        <label class="flex items-center gap-3 rounded-2xl border border-white/70 bg-white/60 px-4 py-3 text-sm text-slate-600 shadow-sm">
            <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }} class="rounded border-slate-300 text-slate-900 focus:ring-slate-900">
            <span>Keep me signed in on this device</span>
        </label>

        <button type="submit" class="inline-flex w-full items-center justify-center rounded-2xl bg-slate-950 px-4 py-3.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-slate-800">
            Sign in
        </button>
    </form>

    @if (config('kaizen-pro-starter.registration_enabled', true))
        <p class="text-center text-sm text-slate-500">
            New here?
            <a href="{{ route('kaizen.register') }}" class="font-semibold text-sky-600 transition hover:text-sky-500">Create an account</a>
        </p>
    @endif
@endsection
