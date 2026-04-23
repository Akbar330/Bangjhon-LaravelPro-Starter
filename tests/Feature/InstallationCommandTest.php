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
        $this->artisan('kaizen:install', ['--force' => true])
            ->expectsOutputToContain('Kaizen Pro Starter installed successfully.')
            ->assertSuccessful();

        $this->assertDatabaseHas('users', [
            'email' => config('kaizen-pro-starter.admin.email'),
            'role' => 'admin',
        ]);

        $publishedAsset = public_path('vendor/kaizen/laravel-pro-starter/pro-starter.css');
        $this->assertFileExists($publishedAsset);

        $admin = User::where('email', config('kaizen-pro-starter.admin.email'))->first();
        $this->assertNotNull($admin);
    }
}
