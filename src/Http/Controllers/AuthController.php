<?php

namespace Bangjhon\LaravelProStarter\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Bangjhon\LaravelProStarter\Support\ActivityLogger;
use Bangjhon\LaravelProStarter\Support\UserModel;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('bangjhon-pro-starter::auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean'],
        ]);

        if (! Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ], $request->boolean('remember'))) {
            return back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
        }

        $request->session()->regenerate();

        ActivityLogger::log('auth.login', 'User signed in successfully.', Auth::id());

        return redirect()->intended($this->redirectPath(Auth::user()));
    }

    public function showRegister()
    {
        abort_unless(config('bangjhon-pro-starter.registration_enabled', true), 404);

        return view('bangjhon-pro-starter::auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        abort_unless(config('bangjhon-pro-starter.registration_enabled', true), 404);

        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(UserModel::tableName(), 'email')],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $userModel = UserModel::className();
        $user = new $userModel();
        $user->forceFill([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => Hash::make($attributes['password']),
            'role' => 'user',
        ])->save();

        Auth::login($user);
        $request->session()->regenerate();

        ActivityLogger::log('auth.register', 'A new user account was created.', $user->getAuthIdentifier());

        return redirect()->route('bangjhon.dashboard')
            ->with('status', 'Your account is ready. Welcome aboard.');
    }

    public function logout(Request $request): RedirectResponse
    {
        ActivityLogger::log('auth.logout', 'User signed out.', Auth::id());

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('bangjhon.login')
            ->with('status', 'You have been signed out.');
    }

    protected function redirectPath(?Authenticatable $user): string
    {
        return ($user?->role ?? 'user') === 'admin'
            ? route('bangjhon.admin.dashboard')
            : route('bangjhon.dashboard');
    }
}
