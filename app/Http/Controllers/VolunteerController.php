<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $volunteers = Volunteer::all();
        return Inertia::render('Volunteers/Main', [
            'volunteers' => $volunteers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Volunteers/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($user_id = Auth::user()->id) {
            $volunteer = new Volunteer();
            $volunteer->event_id = $request->event['id'];
            $volunteer->user_id = $user_id;
            $volunteer->save();
        }

        session()->flash('flash.banner', __('Thank you, :user! Your have been successfully registered as volunteer. One of our tem members will contact you soon.', ['user' => Auth::user()->name]));
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Volunteer $volunteer): Response
    {
        return Inertia::render('Volunteers/Detail', [
            'volunteer' => $volunteer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Volunteer $volunteer): Response
    {
        return Inertia::render('Volunteers/Edit', [
            'volunteer' => $volunteer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Volunteer $volunteer): void
    {
        if ($request->event_id != null) { $volunteer->event_id = $request->event_id; }
        if ($request->user_id != null) { $volunteer->user_id = $request->user_id; }
        $volunteer->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Volunteer $volunteer): void
    {
        $volunteer->delete();
    }
}
