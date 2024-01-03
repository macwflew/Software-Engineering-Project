<?php

namespace Tests\Unit;

use App\Http\Controllers\EventController;
use App\Models\Event;
use Tests\TestCase;
use Mockery;

class EventControllerDestroyTest extends TestCase
{
    public function testDestroy()
    {
        $mockEvent = Mockery::mock(Event::class);
        $mockEvent->shouldReceive('delete')->once();

        $controller = new EventController();

        $controller->destroy($mockEvent);

         }
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
