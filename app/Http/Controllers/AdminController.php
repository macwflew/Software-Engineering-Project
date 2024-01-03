<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $users = User::with('roles.permissions')->get();
        $roles = Role::with('permissions')->oredrBy('id')->get();

        return Inertia::render('Admin/Users/Main', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    /**
     * Update the list of user's roles.
     */
    public function updateRole(Request $request): void
    {
        $user = User::findOrFail($request->user['id']);
        $role = Role::findOrFail($request->role['id']);

        foreach ($user->roles as $r) { $user->roles()->detach($r); }
        $user->roles()->attach($role);
    }

    /**
     * Update the list of role's permissions.
     */
    public function updatePermission(Request $request): void
    {
        $role = Role::findOrFail($request->role['id']);
        $permission = Permission::findOrFail($request->permission['id']);

        if ($role->permissions->contains($permission)) {
            $role->permissions()->detach($permission);
        } else {
            $role->permissions()->attach($permission);
        }
    }
}
