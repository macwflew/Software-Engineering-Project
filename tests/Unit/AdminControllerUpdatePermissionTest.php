<?php

namespace Tests\Unit;

use App\Http\Controllers\AdminController;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Tests\TestCase;
use Mockery;

class AdminControllerUpdatePermissionTest extends TestCase
{
    public function testUpdatePermission()
    {
        // Create an instance of Role
        $mockRole = Mockery::mock(Role::class);

        // Mock the methods on the instance, replace any() with specific values
        $mockRole->shouldReceive('find')->with(1)->andReturn($mockRole);
        $mockRole->shouldReceive('permissions')->andReturnSelf();
        $mockRole->shouldReceive('contains')->once()->andReturn(true);
        $mockRole->shouldReceive('detach')->once();
        $mockRole->shouldReceive('attach')->never();

        // Create an instance of Permission
        $mockPermission = Mockery::mock(Permission::class);

        // Mock the methods on the instance, replace any() with specific values
        $mockPermission->shouldReceive('find')->with(1)->andReturn($mockPermission);

        // Create an instance of AdminController
        $controller = new AdminController();

        $request = new Request([
            'role' => ['id' => 1],
            'permission' => ['id' => 1]
        ]);

        $controller->updatePermission($request);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
