<?php

namespace Tests\Unit;

use App\Http\Controllers\FeedbackController;
use App\Models\Feedback;
use Tests\TestCase;
use Mockery;

class FeedbackControllerShowTest extends TestCase
{
    public function testShow()
    {
        $mockFeedback = Mockery::mock(Feedback::class);
        $controller = new FeedbackController();

        $response = $controller->show($mockFeedback);

        $this->assertEquals('Feedbacks/Show', $response->name);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
