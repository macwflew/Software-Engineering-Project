<?php

namespace Tests\Unit;

use App\Http\Controllers\ItemController;
use App\Models\Item;
use Tests\TestCase;
use Mockery;

class ItemControllerEditTest extends TestCase
{
    public function testEdit()
    {
        $mockItem = Mockery::mock(Item::class);
        $controller = new ItemController();

        $response = $controller->edit($mockItem);

        $this->assertEquals('Items/Edit', $response->name);
    }
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
