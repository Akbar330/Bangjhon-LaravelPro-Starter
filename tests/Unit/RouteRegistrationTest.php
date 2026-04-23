<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class RouteRegistrationTest extends TestCase
{
    #[Test]
    public function package_routes_are_registered(): void
    {
        $this->assertTrue(Route::has('kaizen.login'));
        $this->assertTrue(Route::has('kaizen.dashboard'));
        $this->assertTrue(Route::has('kaizen.admin.dashboard'));
        $this->assertTrue(Route::has('kaizen.admin.users'));
    }
}
