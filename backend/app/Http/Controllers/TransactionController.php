<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index()
    {
        return Transaction::all();
    }


    public function store(Request $request)
    {
        $tran = new Transaction();
        $tran->user_id = $request->user_id;
        $tran->tran_id = $request->tran_id;
        $tran->payment_option = $request->payment_option;
        $tran->hash = $request->hash;
        $tran->status = $request->status;
        $tran->currency = $request->currency;
        $tran->amount = $request->amount;
        $tran->save();
        return response()->json(['msg' => 'payment success']);
    }


    public function show($id)
    {
        return Transaction::where("user_id", $id)->get();
    }


    public function update(Request $request, Transaction $transaction)
    {
        //
    }


    public function destroy(Transaction $transaction)
    {
        //
    }
}
