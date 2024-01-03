<?php

namespace Tests\Unit;

use App\Http\Controllers\FoodController;
use App\Models\Food;
use Illuminate\Http\Request;
use Tests\TestCase;
use Mockery;

class FoodControllerStoreTest extends TestCase
{
    public function testStore()
    {
        $mockFood = Mockery::mock(Food::class)->makePartial();
        Food::shouldReceive('new')->andReturn($mockFood);
        $mockFood->shouldReceive('save')->once();

        $controller = new FoodController();

        $request = new Request([
            'name' => 'Test Food'
        ]);

        $response = $controller->store($request);

        $this->assertEquals('/foods', $response->getTargetUrl());
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
