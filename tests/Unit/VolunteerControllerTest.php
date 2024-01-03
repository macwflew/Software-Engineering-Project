<?php


use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

//beforeEach(function () {
//    // Common setup, like authentication
//});

it('displays a listing of volunteers', function () {
    Volunteer::factory()->count(3)->create();

    $response = $this->get(route('volunteers.index'));

    $response->assertInertia(fn($page) => $page
        ->component('Volunteers/Main')
        ->has('volunteers', 3)
    );
});

it('displays the volunteer creation view', function () {
    $response = $this->get(route('volunteers.create'));

    $response->assertInertia(fn($page) => $page
        ->component('Volunteers/Create')
    );
});

it('stores a new volunteer', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $volunteerData = [
        'event_id' => 1 // Assume this is a valid event ID
    ];

    $response = $this->post(route('volunteers.store'), ['event' => ['id' => $volunteerData['event_id']]]);

    $response->assertRedirect('/volunteers');
    $this->assertDatabaseHas('volunteers', [
        'user_id' => $user->id,
        'event_id' => $volunteerData['event_id']
    ]);
});

it('displays a specific volunteer', function () {
    $volunteer = Volunteer::factory()->create();

    $response = $this->get(route('volunteers.show', $volunteer));

    $response->assertInertia(fn($page) => $page
        ->component('Volunteers/Detail')
        ->has('volunteer')
    );
});

it('displays the edit view for a volunteer', function () {
    $volunteer = Volunteer::factory()->create();

    $response = $this->get(route('volunteers.edit', $volunteer));

    $response->assertInertia(fn($page) => $page
        ->component('Volunteers/Edit')
        ->has('volunteer')
    );
});

it('updates a volunteer', function () {
    $volunteer = Volunteer::factory()->create();
    $newEventData = ['event_id' => 2]; // Assume this is a new valid event ID

    $this->put(route('volunteers.update', $volunteer), $newEventData);

    $this->assertDatabaseHas('volunteers', [
        'id' => $volunteer->id,
        'event_id' => $newEventData['event_id']
    ]);
});

it('deletes a volunteer', function () {
    $volunteer = Volunteer::factory()->create();

    $this->delete(route('volunteers.destroy', $volunteer));

    $this->assertDatabaseMissing('volunteers', ['id' => $volunteer->id]);
});
