<?php

use Illuminate\Support\Facades\Route;
use Kaizen\LaravelProStarter\Http\Controllers\AuthController;
use Kaizen\LaravelProStarter\Http\Controllers\DashboardController;

$middleware = config('kaizen-pro-starter.middleware', ['web']);
$prefix = trim((string) config('kaizen-pro-starter.route_prefix', ''), '/');

Route::middleware($middleware)
    ->prefix($prefix)
    ->group(function (): void {
        Route::get('/', function () {
            $user = auth()->user();

            if (! $user) {
                return redirect()->route('kaizen.login');
            }

            return $user->role === 'admin'
                ? redirect()->route('kaizen.admin.dashboard')
                : redirect()->route('kaizen.dashboard');
        })->name('kaizen.home');

        Route::middleware('guest')->group(function (): void {
            Route::get('/login', [AuthController::class, 'showLogin'])->name('kaizen.login');
            Route::post('/login', [AuthController::class, 'login'])->name('kaizen.login.attempt');
            Route::get('/register', [AuthController::class, 'showRegister'])->name('kaizen.register');
            Route::post('/register', [AuthController::class, 'register'])->name('kaizen.register.store');
        });

        Route::middleware('auth')->group(function (): void {
            Route::post('/logout', [AuthController::class, 'logout'])->name('kaizen.logout');
            Route::get('/dashboard', [DashboardController::class, 'user'])->name('kaizen.dashboard');
        });

        Route::middleware(['auth', 'kaizen.role:admin'])->prefix('admin')->group(function (): void {
            Route::get('/dashboard', [DashboardController::class, 'admin'])->name('kaizen.admin.dashboard');
            Route::get('/users', [DashboardController::class, 'users'])->name('kaizen.admin.users');
        });
    });
