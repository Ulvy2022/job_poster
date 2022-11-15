<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use App\Models\Transaction;

class PaymentController extends Controller
{
    public function stripePost(Request $request)
    {
        $transaction = new Transaction();
        try {
            $stripe = new \Stripe\StripeClient(
                env("STRIPE_SECRET")
            );
            $res = $stripe->tokens->create([
                'card' => [
                    'number' => $request->number,
                    'exp_month' => $request->exp_month,
                    'exp_year' => $request->exp_year,
                    'cvc' => $request->cvc,
                ],
            ]);
            Stripe\Stripe::setApiKey(env("STRIPE_SECRET"));
            $response = $stripe->charges->create([
                'amount' => $request->amount,
                'currency' => 'usd',
                'source' => $res->id,
                'description' => $request->description,
            ]);
            $transaction->user_id = $request->user_id;
            $transaction->plane_id = $request->plane_id;
            $transaction->purchased_at = $request->purchased_at;
            $transaction->card_brand = $request->card_brand;
            $transaction->amount = $request->amount;
            $transaction->card_number = $request->card_number;
            $transaction->purchased_at = $request->purchased_at;
            $transaction->expired_at = $request->expired_at;
            $transaction->status = $request->status;
            $transaction->save();
            return response()->json([$response], 201);
        } catch (Exception $ex) {
            return response()->json(['msg' => 'error'], 500);
        }
    }
}
