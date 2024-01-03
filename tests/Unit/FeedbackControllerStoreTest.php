<?php

namespace Tests\Unit;

use App\Http\Controllers\FeedbackController;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FeedbackControllerStoreTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        // Create a user instance for Auth
        $user = User::factory()->create();
        $this->actingAs($user);

        $controller = new FeedbackController();

        $request = new Request([
            'title' => 'Test Feedback',
            'description' => 'Test Description'
        ]);

        $response = $controller->store($request);

        // Assert a new Feedback record was created
        $this->assertDatabaseHas('feedbacks', [
            'title' => 'Test Feedback',
            'description' => 'Test Description',
            'user_id' => $user->id
        ]);

        // Assert the response
        $this->assertEquals('/feedbacks/create', $response->getTargetUrl());
    }



protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
