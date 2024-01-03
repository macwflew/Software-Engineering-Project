<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $foods = Food::all();
        return Inertia::render('Food/Main', [
            'foods' => $foods
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Foods/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $food = new Food();
        $food->name = $request->name;
        $food->save();
        return redirect('/foods');
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food): Response
    {
        return Inertia::render('Foods/Detail', [
            'food' => $food
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food): Response
    {
        return Inertia::render('Foods/Edit', [
            'food' => $food
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food): void
    {
        if ($request->name != null) { $food->name = $request->name; }
        $food->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food): void
    {
        $food->delete();
    }
}
