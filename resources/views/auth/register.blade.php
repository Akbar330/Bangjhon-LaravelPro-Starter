@extends('kaizen-pro-starter::layouts.guest')

@section('title', 'Create your account')
@section('subtitle', 'Start with a polished starter experience and get redirected to your personal dashboard right away.')

@section('content')
    <form action="{{ route('kaizen.register.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="mb-2 block text-sm font-medium text-slate-700">Full name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full rounded-2xl border-white/70 bg-white/70 px-4 py-3 text-slate-900 shadow-sm backdrop-blur placeholder:text-slate-400 focus:border-sky-400 focus:ring-sky-400">
        </div>

        <div>
            <label for="email" class="mb-2 block text-sm font-medium text-slate-700">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required class="w-full rounded-2xl border-white/70 bg-white/70 px-4 py-3 text-slate-900 shadow-sm backdrop-blur placeholder:text-slate-400 focus:border-sky-400 focus:ring-sky-400">
        </div>

        <div>
            <label for="password" class="mb-2 block text-sm font-medium text-slate-700">Password</label>
            <input id="password" type="password" name="password" required class="w-full rounded-2xl border-white/70 bg-white/70 px-4 py-3 text-slate-900 shadow-sm backdrop-blur placeholder:text-slate-400 focus:border-sky-400 focus:ring-sky-400">
        </div>

        <div>
            <label for="password_confirmation" class="mb-2 block text-sm font-medium text-slate-700">Confirm password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full rounded-2xl border-white/70 bg-white/70 px-4 py-3 text-slate-900 shadow-sm backdrop-blur placeholder:text-slate-400 focus:border-sky-400 focus:ring-sky-400">
        </div>

        <button type="submit" class="inline-flex w-full items-center justify-center rounded-2xl bg-slate-950 px-4 py-3.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-slate-800">
            Create account
        </button>
    </form>

    <p class="text-center text-sm text-slate-500">
        Already registered?
        <a href="{{ route('kaizen.login') }}" class="font-semibold text-sky-600 transition hover:text-sky-500">Sign in</a>
    </p>
@endsection
