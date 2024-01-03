<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\CartTextbook;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartTextbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CartTextbook::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        if($user = Auth::user()) {
            CartTextbook::create([
                'textbook_id' => $request->textbook['id'],
                'user_id' => $user->id
            ]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CartTextbook $cartTextbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartTextbook $cartTextbook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartTextbook $cartTextbook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartTextbook $cartTextbook): void
    {
        $cartTextbook->delete();
    }
}
