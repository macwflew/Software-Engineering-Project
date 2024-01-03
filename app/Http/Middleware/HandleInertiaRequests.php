<?php

namespace App\Http\Middleware;

use App\Models\CartItem;
use App\Models\CartTextbook;
use App\Models\Item;
use App\Models\Role;
use App\Models\Textbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $user = Auth::user();
        $cartItems = null;
        $cartTextbooks = null;
        if ($user != null) {
            if ($user_id = $user->id) {
                $cartItems = CartItem::with('item.price')->where('user_id', $user_id)->get();
                $cartTextbooks = CartTextbook::with('textbook')->where('user_id', $user_id)->get();
            }

            return array_merge(parent::share($request), [
                'ziggy' => fn() => [
                    ...(new Ziggy)->toArray(),
                    'location' => $request->url(),
                ],
                'currentUserRole' => fn() => count($user->roles) > 0 ? $user->roles[0] : Role::find(3),
                'cartProducts' => fn() => $cartItems,
                'cartTextbooks' => fn() => $cartTextbooks
            ]);
        }
        return [];
    }
}
