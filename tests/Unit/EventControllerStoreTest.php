<?php

namespace Tests\Unit;

use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventControllerStoreTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        $controller = new EventController();

        $request = new Request([
            'title' => 'Test Event',
            'description' => 'Test Description',
            'image_path' => 'path/to/image.jpg'
        ]);

        $response = $controller->store($request);

        $this->assertEquals('/events', $response->getTargetUrl());
        $this->assertDatabaseHas('events', [
            'title' => 'Test Event',
            'description' => 'Test Description',
            'image_path' => 'path/to/image.jpg'
        ]);



        $response = $controller->store($request);

        $this->assertEquals('/events', $response->getTargetUrl());
    }


    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
