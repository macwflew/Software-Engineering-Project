<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $transactions = Transaction::with('order')->paginate(10);

        return Inertia::render('Transactions/Main', [
            'transactions' => $transactions
        ]);
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
    public function store(Request $request): void
    {
        $nweTransaction = null;
        if ($user_id = Auth::user()->id) {
            $nweTransaction = new Transaction();
            $nweTransaction->order_id = $request->item_id;
            $nweTransaction->user_id = $user_id;
            $nweTransaction->save();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction): Response
    {
        $transaction = Transaction::with('order')->get();
        return Inertia::render('Transactions/Show', [
            'transaction' => $transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction): void
    {
        $transaction->delete();
    }
}
