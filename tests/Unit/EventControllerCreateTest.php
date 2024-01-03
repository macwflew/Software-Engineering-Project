<?php

namespace Tests\Unit;

use App\Http\Controllers\EventController;
use Tests\TestCase;

class EventControllerCreateTest extends TestCase
{
    public function testCreate()
    {
        // Simulate a GET request to the route that uses EventController@create
        // Replace 'your-route' with the actual route
        $response = $this->get('/your-route');

        // Use assertInertia to check the Inertia response
        $response->assertInertia(function ($page) {
            $page->component('Events/Create');
        });
    }

    protected function tearDown(): void
    {
        // Close Mockery
        // Mockery::close(); // Uncomment this if you're using Mockery
        parent::tearDown();
    }
}
