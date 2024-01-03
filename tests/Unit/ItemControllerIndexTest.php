<?php

namespace Tests\Unit;

use App\Http\Controllers\ItemController;
use App\Models\Item;
use Tests\TestCase;
use Mockery;

class ItemControllerIndexTest extends TestCase
{
    public function testIndex()
    {
        $mockedItems = Mockery::mock('Illuminate\Database\Eloquent\Collection');
        Item::shouldReceive('with')->with('itemCategory')->andReturnSelf();
        Item::shouldReceive('get')->andReturn($mockedItems);

        $controller = new ItemController();

        $response = $controller->index();

        $this->assertEquals('Items/Main', $response->name);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
