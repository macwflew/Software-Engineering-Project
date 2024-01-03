<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $users = User::with('roles.permissions')->get();
        $roles = Role::with('permissions')->get();

        return Inertia::render('Admin/Users/Main', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Users/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        $user = User::with('roles')->where('id', $user->id)->first();

        return Inertia::render('Admin/Users/Show', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response
    {
        return Inertia::render('Admin/Users/Edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): void
    {
        $user->update([
            'name' => $request->name
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        session()->flash('flash.banner', __(':user has been deleted successfully.', ['user' => $user->name]));
        session()->flash('flash.bannerStyle', 'success');

        return redirect('users');
    }

    public function subscribe(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $user->update([
            'subscribed' => 1
        ]);

        session()->flash('flash.banner', __('Great :user!You have been successfully subscribed to our newsletter.', ['user' => $user->name]));
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }
}
