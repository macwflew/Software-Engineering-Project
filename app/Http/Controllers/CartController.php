<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\Models\CartItem;
use App\Models\CartTextbook;
use App\Models\Item;
use App\Models\Order;
use App\Models\Textbook;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Inertia\Response;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Add an item to the User's shopping cart.
     */
    public function emptyCart(): RedirectResponse
    {
        $user = User::findOrFail(Auth::user()->id);
        $cartItems = CartItem::where('user_id', $user->id)->get();
        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }

        $cartTextbooks = CartTextbook::where('user_id', $user->id)->get();
        foreach ($cartTextbooks as $cartTextbook) {
            $cartTextbook->delete();
        }

        return redirect()->back();
    }

    /**
     * Add an item to the User's shopping cart.
     */
    public function checkout(Request $request): RedirectResponse
    {
        app('App\Http\Controllers\OrderController')->store($request);
        $this->emptyCart();

        session()->flash('flash.banner', __('Thank you, :user! Your order has been created successfully.', ['user' => Auth::user()->name]));
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }

}
