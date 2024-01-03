<?php

namespace Tests\Unit;

use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class AdminControllerUpdateRoleTest extends TestCase
{
    public function testUpdateRole()
    {
        // Explicitly set the application environment to local
        App::detectEnvironment(function () {
            return 'local';
        });

        // Manually set the database connection to use the same as your .env file
        Config::set('database.default', 'mysql');
        Config::set('database.connections.mysql.database', 'ieee_app');

        // Create a user and a role using factories
        $user = User::factory()->create();
        $role = Role::factory()->create();

        // Your test logic here
        $controller = new AdminController();

        $request = new Request([
            'user' => ['id' => $user->id],
            'role' => ['id' => $role->id]
        ]);

        $controller->updateRole($request);

        // Refresh the user instance
        $user = $user->fresh();

        // Assertions
        $this->assertTrue($user->roles->contains($role));
    }

    // tearDown method remains the same



protected function tearDown(): void
{
    Mockery::close();
    parent::tearDown();
}}
