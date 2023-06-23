<?php

namespace App\Http\Controllers;

use App\Models\Trasaction;
use Illuminate\Http\Request;

class TrasactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Trasaction::all();

        return response()->json([
            'success' => true,
            'data' => $transactions
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
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'type' => 'required',
            'category' => 'required',
            'amount' => 'required',
        ]);

        $transaction = Trasaction::create([
            'user_id' => $request->user_id,
            'type' => $request->type,
            'category' => $request->category,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        return response()->json([
            'success' => true,
            'data' => $transaction
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Trasaction $trasaction, $transaction_id)
    {
        $transaction = Trasaction::find($transaction_id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trasaction $trasaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trasaction $trasaction, $transaction_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trasaction $trasaction, $transaction_id)
    {
        $transaction = Trasaction::find($transaction_id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found'
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully'
        ]);
    }
}
