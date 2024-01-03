<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $events = Event::all();
        return Inertia::render('Events/Main', [
            'events' => new EventCollection($events)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Events/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->image_path = $request->image_path;
        $event->save();
        return redirect('/events');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event): Response
    {
        return Inertia::render('Events/Show', [
            'event' => new EventResource($event)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event): Response
    {
        return Inertia::render('Events/Edit', [
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event): void
    {
        if ($request->title != null) { $event->title = $request->title; }
        if ($request->description != null) { $event->description = $request->description; }
        if ($request->image_path != null) { $event->image_path = $request->image_path; }
        $event->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event): void
    {
        $event->delete();
    }
}
