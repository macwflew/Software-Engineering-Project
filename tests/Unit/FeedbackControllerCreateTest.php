<?php

namespace Tests\Unit;

use App\Http\Controllers\FeedbackController;
use Tests\TestCase;
use Mockery;

class FeedbackControllerCreateTest extends TestCase
{
    public function testCreate()
    {
        $controller = new FeedbackController();
        $response = $controller->create();

        $this->assertInstanceOf(\Inertia\Response::class, $response);
    }





    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
