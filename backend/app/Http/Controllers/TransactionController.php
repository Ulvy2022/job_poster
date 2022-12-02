<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

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

    public function getHash($amount)
    {

        $data = 'ec002497' . $this->getTranID() . $amount;
        // return response()->json(['amount' => $data]);
        return base64_encode(
            hash_hmac(
                'sha512',
                $data,
                "a4a12ed92f831906729ac771f8e43136a81209e6",
                true
            )
        );
    }

    public function getTranID()
    {
        $transaction = Transaction::all();
        if ($transaction->isEmpty()) {
            return "tran-id-" . 9;
        }
        $transaction = Transaction::orderBy('id', 'desc')->first();
        $tran_id = "tran-id-" . $transaction->id += 1;
        return $tran_id;
        // $tran_id = Str::random(3) . "-0" . Str::random(3);
        // return $tran_id;

    }

    public function getTimestamp()
    {
        return date("Ymdhis");
    }

    public function getPyamentResponse(Request $request)
    {
        $client = new Client();
        $response = $client->request(
            "GET",
            // 'https://checkout-sandbox.payway.com.kh/api/payment-gateway/v1/payments/check-transaction',
            "http://localhost:8000/api/user",
            // [
            //     "form_params" => [
            //         "merchant_id" => $request->merchant_id,
            //         "tran_id" => $request->tran_id,
            //         "hash" => $request->hash,
            //     ]
            // ]

        );
        $body = $response->getBody();
        return response()->json(['payment' => $body]);
    }
}
