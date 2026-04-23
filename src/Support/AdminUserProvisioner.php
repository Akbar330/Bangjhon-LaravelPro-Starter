<?php

namespace Kaizen\LaravelProStarter\Support;

use Illuminate\Support\Facades\Hash;

class AdminUserProvisioner
{
    public function provision(): array
    {
        $modelClass = UserModel::className();
        $credentials = config('kaizen-pro-starter.admin');

        $user = $modelClass::query()->firstOrNew([
            'email' => $credentials['email'],
        ]);

        $user->forceFill([
            'name' => $credentials['name'],
            'password' => Hash::make($credentials['password']),
            'role' => 'admin',
        ])->save();

        ActivityLogger::log('system.admin_seeded', 'Default admin account is available.', $user->getKey());

        return [
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ];
    }
}
