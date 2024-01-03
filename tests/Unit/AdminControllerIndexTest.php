<?php

namespace Tests\Unit;

use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminControllerIndexTest extends TestCase
{
    use RefreshDatabase; // Use RefreshDatabase trait to reset the database after testing

    public function testIndex()
    {
        // Create sample data using Laravel's factory methods
        $users = User::factory()->count(10)->create(); // Adjust the number as needed
        $roles = Role::factory()->count(5)->create();  // Adjust the number as needed

        // Associate roles with users if necessary
        // ...

        $controller = new AdminController();

        $response = $controller->index();

        // Assert that the correct view is returned
        $this->assertEquals('Admin/Users/Main', $response->name);

        // You can also add more assertions to check if the data is passed correctly
        // ...
    }


protected function tearDown(): void
    {
        // Close Mockery
        Mockery::close();
        parent::tearDown();
    }
}

