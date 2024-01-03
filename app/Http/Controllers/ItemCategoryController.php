<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $itemCategory = ItemCategory::all();
        return Inertia::render('ItemCategories/Main', [
            'itemCategory' => $itemCategory
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('ItemCategories/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $itemCategory = new ItemCategory();
        $itemCategory->name = $request->name;
        $itemCategory->description = $request->description;
        $itemCategory->save();
        return redirect('/itemCategories');
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemCategory $itemCategory): Response
    {
        return Inertia::render('ItemCategories/Detail', [
            'itemCategory' => $itemCategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemCategory $itemCategory): Response
    {
        return Inertia::render('ItemCategories/Edit', [
            'itemCategory' => $itemCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemCategory $itemCategory): void
    {
        if ($request->name != null) { $itemCategory->name = $request->name; }
        if ($request->description != null) { $itemCategory->description = $request->description; }
        $itemCategory->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemCategory $itemCategory): void
    {
        $itemCategory->delete();
    }
}
