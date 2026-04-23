<?php

use Illuminate\Support\Facades\Route;
use Bangjhon\LaravelProStarter\Http\Controllers\AuthController;
use Bangjhon\LaravelProStarter\Http\Controllers\DashboardController;

$middleware = config('bangjhon-pro-starter.middleware', ['web']);
$prefix = trim((string) config('bangjhon-pro-starter.route_prefix', ''), '/');

Route::middleware($middleware)
    ->prefix($prefix)
    ->group(function (): void {
        Route::get('/', function () {
            $user = auth()->user();

            if (! $user) {
                return redirect()->route('bangjhon.login');
            }

            return $user->role === 'admin'
                ? redirect()->route('bangjhon.admin.dashboard')
                : redirect()->route('bangjhon.dashboard');
        })->name('bangjhon.home');

        Route::middleware('guest')->group(function (): void {
            Route::get('/login', [AuthController::class, 'showLogin'])->name('bangjhon.login');
            Route::post('/login', [AuthController::class, 'login'])->name('bangjhon.login.attempt');
            Route::get('/register', [AuthController::class, 'showRegister'])->name('bangjhon.register');
            Route::post('/register', [AuthController::class, 'register'])->name('bangjhon.register.store');
        });

        Route::middleware('auth')->group(function (): void {
            Route::post('/logout', [AuthController::class, 'logout'])->name('bangjhon.logout');
            Route::get('/dashboard', [DashboardController::class, 'user'])->name('bangjhon.dashboard');
        });

        Route::middleware(['auth', 'bangjhon.role:admin'])->prefix('admin')->group(function (): void {
            Route::get('/dashboard', [DashboardController::class, 'admin'])->name('bangjhon.admin.dashboard');
            Route::get('/users', [DashboardController::class, 'users'])->name('bangjhon.admin.users');
        });
    });
