<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $roles = Role::with('permissions')->orderBy('id')->get();
        $permissions = Permission::orderBy('name', 'asc')->get();
        return Inertia::render('Admin/Roles/Main', [
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Roles/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        return redirect('/roles');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): Response
    {
        $role = Role::with('permissions')->where('id', $role->id)->first();
        return Inertia::render('Admin/Roles/Show', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): Response
    {
        return Inertia::render('Admin/Roles/Edit', [
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role): void
    {
        if ($request->name != null) { $role->name = $request->name; }
        $role->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): void
    {
        $role->delete();
    }
}
