<?php

namespace Bangjhon\LaravelProStarter\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Bangjhon\LaravelProStarter\Models\Activity;
use Bangjhon\LaravelProStarter\Support\UserModel;

class DashboardController extends Controller
{
    public function user(): View
    {
        $userModel = UserModel::className();

        return view('bangjhon-pro-starter::dashboard.index', [
            'user' => Auth::user(),
            'stats' => [
                ['label' => 'Community members', 'value' => $userModel::count(), 'tone' => 'blue'],
                ['label' => 'Admins online-ready', 'value' => $userModel::where('role', 'admin')->count(), 'tone' => 'emerald'],
                ['label' => 'Your activity', 'value' => Activity::query()->where('user_id', Auth::id())->count(), 'tone' => 'amber'],
            ],
            'recentActivity' => Activity::query()
                ->where('user_id', Auth::id())
                ->latest()
                ->take(6)
                ->get(),
        ]);
    }

    public function admin(): View
    {
        $userModel = UserModel::className();

        return view('bangjhon-pro-starter::dashboard.admin', [
            'stats' => [
                ['label' => 'Total users', 'value' => $userModel::count(), 'tone' => 'blue'],
                ['label' => 'Admin accounts', 'value' => $userModel::where('role', 'admin')->count(), 'tone' => 'violet'],
                ['label' => 'Activity records', 'value' => Activity::query()->count(), 'tone' => 'amber'],
                ['label' => 'New users today', 'value' => $userModel::whereDate('created_at', now()->toDateString())->count(), 'tone' => 'emerald'],
            ],
            'recentUsers' => $userModel::query()
                ->latest()
                ->take(8)
                ->get(['id', 'name', 'email', 'role', 'created_at']),
            'recentActivity' => Activity::query()
                ->latest()
                ->take(8)
                ->get(),
        ]);
    }

    public function users(): View
    {
        $userModel = UserModel::className();

        return view('bangjhon-pro-starter::dashboard.users', [
            'users' => $userModel::query()
                ->latest()
                ->paginate(10),
        ]);
    }
}
