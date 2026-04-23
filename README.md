# kaizen/laravel-pro-starter

`kaizen/laravel-pro-starter` is a production-ready Laravel package that adds a custom authentication system, role-aware dashboards, and a premium modern UI to any Laravel 10+ application.

## Features

- Custom authentication flow built with Laravel controllers and middleware
- Registration, login, logout, remember me, and role-based redirects
- `admin` and `user` roles out of the box
- Premium dashboard UI with sidebar, topbar, stat cards, tables, and responsive auth screens
- Publishable config, views, and assets
- Install command that publishes package resources, runs migrations, and seeds a default admin user
- Extendable activity log table for dashboard metrics

## Requirements

- PHP 8.1+
- Laravel 10, 11, 12, or 13

## Installation

Install the package via Composer:

```bash
composer require kaizen/laravel-pro-starter
```

Run the installer:

```bash
php artisan kaizen:install
```

The installer will:

- publish configuration
- publish Blade views
- publish assets
- run package migrations
- seed a default admin account
- print the generated credentials and next steps

## Default Routes

The package registers the following routes by default:

- `/login`
- `/register`
- `/logout`
- `/dashboard`
- `/admin/dashboard`
- `/admin/users`

All route names are prefixed with `kaizen.`.

## Default Admin Credentials

These values come from `config/kaizen-pro-starter.php` and can be changed before running the installer.

- Email: `admin@kaizen.test`
- Password: `password123`

## Usage

After installation:

1. Visit `/register` to create a standard user account.
2. Visit `/login` to sign in.
3. Users are redirected to `/dashboard`.
4. Admins are redirected to `/admin/dashboard`.

Use the included role middleware on your own routes:

```php
Route::middleware(['web', 'auth', 'kaizen.role:admin'])->group(function () {
    Route::get('/reports', fn () => 'Only admins can see this');
});
```

## Configuration

Publish the package configuration manually if needed:

```bash
php artisan vendor:publish --tag=kaizen-pro-starter-config
```

Useful options:

- route prefix
- route middleware stack
- registration toggle
- branding labels
- seeded admin credentials

## Published Resources

```bash
php artisan vendor:publish --tag=kaizen-pro-starter-config
php artisan vendor:publish --tag=kaizen-pro-starter-views
php artisan vendor:publish --tag=kaizen-pro-starter-assets
```

## Screenshots

- Auth screen placeholder: `docs/screenshots/login.png`
- Admin dashboard placeholder: `docs/screenshots/admin-dashboard.png`
- User dashboard placeholder: `docs/screenshots/user-dashboard.png`

## Example Commands

```bash
php artisan kaizen:install
php artisan migrate
php artisan vendor:publish --tag=kaizen-pro-starter-views
php artisan route:list --name=kaizen
```

## Extending The Package

- Update the published views to match your brand.
- Extend the `kaizen_activity_logs` table with your own event metadata.
- Reuse the package middleware and layout structure for additional admin pages.

## Testing

```bash
composer test
```

## License

MIT
