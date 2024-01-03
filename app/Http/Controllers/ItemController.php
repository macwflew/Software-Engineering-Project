<?php

namespace App\Http\Controllers;

use App\Exports\InventoryExport;
use App\Http\Resources\ItemCollection;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $items = Item::with('cartItems', 'itemCategory', 'itemState', 'itemType', 'price')
            ->whereHas('itemState', function($q) {
                $q->where('id', '!=', 3);
            })
            ->get();
        return Inertia::render('Items/Main', [
            'items' => new ItemCollection($items)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Items/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->image_path = $request->image_path;
        $item->item_category_id = $request->item_category_id;
        $item->save();
        return redirect('/items');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item): Response
    {
        $item = Item::with('cartItems', 'itemCategory', 'itemState', 'itemType', 'price')->where('id', $item->id)->first();
        return Inertia::render('Items/Show', [
            'item' => new ItemResource($item)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item): Response
    {
        return Inertia::render('Items/Edit', [
            'item' => new ItemResource($item)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item): void
    {
        if ($request->name != null) { $item->name = $request->name; }
        if ($request->description != null) { $item->description = $request->description; }
        if ($request->image_path != null) { $item->image_path = $request->image_path; }
        if ($request->item_category_id != null) { $item->item_category_id = $request->item_category_id; }
        $item->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item): void
    {
        $item->delete();
    }

    /**
     * Display a listing of the resource.
     */
    public function inventory(): Response
    {
        $items = Item::with('cartItems', 'itemCategory', 'itemState', 'itemType', 'price')->paginate(20);
        return Inertia::render('Inventory/Items/Main', [
            'items' => $items
        ]);
    }

    /**
     * Export all orders.
     */
    public function export(): BinaryFileResponse
    {
        return Excel::download(new InventoryExport, 'inventory.xlsx');
    }
}
