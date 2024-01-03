<?php

namespace Tests\Unit;

use App\Http\Controllers\FoodController;
use App\Models\Food;
use Tests\TestCase;
use Mockery;

class FoodControllerIndexTest extends TestCase
{
    public function testIndex()
    {
        $mockedFoods = Mockery::mock('Illuminate\Database\Eloquent\Collection');
        Food::shouldReceive('all')->andReturn($mockedFoods);

        $controller = new FoodController();

        $response = $controller->index();

        $this->assertEquals('Food/Main', $response->name);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
