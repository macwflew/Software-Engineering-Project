<?php

namespace App\Http\Controllers;

use App\Mail\NewInquiry;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $feedbacks = Feedback::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('Feedbacks/Main', [
            'feedbacks' => $feedbacks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Feedbacks/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $newFeedback = null;
        if ($user_id = Auth::user()->id) {
            $newFeedback = new Feedback();
            $newFeedback->title = $request->title;
            $newFeedback->description = $request->description;
            $newFeedback->user_id = $user_id;
            $newFeedback->save();
        }

        // Mail::to($request->user())->send(new NewInquiry($newFeedback));

        session()->flash('flash.banner', __('Thank you, :user! Your feedback have been successfully received for our team.', ['user' => Auth::user()->name]));
        session()->flash('flash.bannerStyle', 'success');
        return redirect('/feedbacks/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback): Response
    {
        return Inertia::render('Feedbacks/Show', [
            'feedback' => $feedback
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback): Response
    {
        return Inertia::render('Feedbacks/Edit', [
            'feedback' => $feedback
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback): void
    {
        if ($request->title != null) { $feedback->title = $request->title; }
        if ($request->description != null) { $feedback->description = $request->description; }
        if ($user_id = Auth::user()->id) { $feedback->user_id = $user_id; }
        $feedback->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback): void
    {
        $feedback->delete();
    }
}
