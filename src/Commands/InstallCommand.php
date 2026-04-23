<?php

namespace Bangjhon\LaravelProStarter\Commands;

use Illuminate\Console\Command;
use Bangjhon\LaravelProStarter\Support\AdminUserProvisioner;

class InstallCommand extends Command
{
    protected $signature = 'bangjhon:install {--force : Overwrite any published files}';

    protected $description = 'Install the Bangjhon Laravel Pro Starter package resources';

    public function handle(AdminUserProvisioner $provisioner): int
    {
        $force = (bool) $this->option('force');

        $this->components->info('Publishing package configuration...');
        $this->callSilent('vendor:publish', [
            '--tag' => 'bangjhon-pro-starter-config',
            '--force' => $force,
        ]);

        $this->components->info('Publishing package views...');
        $this->callSilent('vendor:publish', [
            '--tag' => 'bangjhon-pro-starter-views',
            '--force' => $force,
        ]);

        $this->components->info('Publishing package assets...');
        $this->callSilent('vendor:publish', [
            '--tag' => 'bangjhon-pro-starter-assets',
            '--force' => $force,
        ]);

        $this->components->info('Running package migrations...');
        $this->call('migrate', ['--force' => true]);

        $credentials = $provisioner->provision();

        $this->newLine();
        $this->components->info('Bangjhon Pro Starter installed successfully.');
        $this->line('Login URL: '.url('/login'));
        $this->line('Admin email: '.$credentials['email']);
        $this->line('Admin password: '.$credentials['password']);
        $this->warn('Change the default admin password after first login.');

        return self::SUCCESS;
    }
}
