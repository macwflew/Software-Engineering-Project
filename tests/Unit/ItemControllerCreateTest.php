<?php

namespace Tests\Unit;

use App\Http\Controllers\ItemController;
use Mockery;
use Tests\TestCase;

class ItemControllerCreateTest extends TestCase
{
    public function testCreate()
    {
        $controller = new ItemController();

        $response = $controller->create();

        $this->assertEquals('Items/Create', $response->name);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
