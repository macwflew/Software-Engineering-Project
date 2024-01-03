<?php

namespace Tests\Unit;

use App\Http\Controllers\FeedbackController;
use App\Models\Feedback;
use Tests\TestCase;
use Mockery;

class FeedbackControllerIndexTest extends TestCase
{
    public function testIndex()
    {
        $mockedFeedbacks = Mockery::mock('Illuminate\Database\Eloquent\Collection');
        Feedback::shouldReceive('with')->with('user')->andReturnSelf();
        Feedback::shouldReceive('orderBy')->with('created_at', 'desc')->andReturnSelf();
        Feedback::shouldReceive('paginate')->with(10)->andReturn($mockedFeedbacks);

        $controller = new FeedbackController();

        $response = $controller->index();

        $this->assertEquals('Feedbacks/Main', $response->name);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
