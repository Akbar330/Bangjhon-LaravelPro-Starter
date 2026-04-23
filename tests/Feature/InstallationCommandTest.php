<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InstallationCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_install_command_provisions_default_admin_user(): void
    {
        $this->artisan('bangjhon:install', ['--force' => true])
            ->expectsOutputToContain('Bangjhon Pro Starter installed successfully.')
            ->assertSuccessful();

        $this->assertDatabaseHas('users', [
            'email' => config('bangjhon-pro-starter.admin.email'),
            'role' => 'admin',
        ]);

        $publishedAsset = public_path('vendor/bangjhon/laravel-pro-starter/pro-starter.css');
        $this->assertFileExists($publishedAsset);

        $admin = User::where('email', config('bangjhon-pro-starter.admin.email'))->first();
        $this->assertNotNull($admin);
    }
}
