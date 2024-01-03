<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $permissions = Permission::all();
        return Inertia::render('Admin/Permissions/Main', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Permissions/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->slug = $request->slug;
        $permission->save();
        return redirect('/permissions');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission): Response
    {
        return Inertia::render('Admin/Permissions/Detail', [
            'permission' => $permission
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission): Response
    {
        return Inertia::render('Admin/Permissions/Edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission): void
    {
        if ($request->name != null) { $permission->name = $request->name; }
        if ($request->slug != null) { $permission->slug = $request->slug; }
        $permission->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission): void
    {
        $permission->delete();
    }
}
