<?php

namespace Tests\Unit;

use App\Http\Controllers\FoodController;
use Tests\TestCase;

class FoodControllerCreateTest extends TestCase
{
    public function testCreate()
    {
        $controller = new FoodController();

        $response = $controller->create();

        $this->assertEquals('Foods/Create', $response->name);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
