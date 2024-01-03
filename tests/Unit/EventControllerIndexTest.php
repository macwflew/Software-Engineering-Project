<?php

namespace Tests\Unit;

use App\Http\Controllers\EventController;
use App\Models\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;

class EventControllerIndexTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $mockedEvents = Mockery::mock('Illuminate\Database\Eloquent\Collection');
        Event::shouldReceive('all')->andReturn($mockedEvents);

        $controller = new EventController();

        $response = $controller->index();

        $this->assertEquals('Events/Main', $response->name);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
