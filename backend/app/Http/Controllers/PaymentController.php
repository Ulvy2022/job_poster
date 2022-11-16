<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use App\Models\Transaction;
use App\Models\Plane;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function stripePost(Request $request)
    {
        $transaction = new Transaction();
        $date = date("Y-m-d");
        try {
            $stripe = new \Stripe\StripeClient(
                env("STRIPE_SECRET")
            );
            $res = $stripe->tokens->create([
                'card' => [
                    'number' => $request->card_number,
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

            ]);

            $transaction->user_id = $request->user_id;
            $transaction->transaction_id = $response['id'];
            $plane = Plane::where("user_id",$request->user_id)->first();
            $transaction->plane_id = $plane['id'];
            $transaction->card_brand = $response['payment_method_details']['card']['brand'];
            $transaction->amount = $request->amount;
            $transaction->currency = $response['currency'];
            $transaction->CVC = $request->cvc;
            $transaction->card_number = $request->card_number;
            $transaction->purchased_at = $request->purchased_at;
            $transaction->status = $response['status'];
            $transaction->zip_code = $request->zip_code;
            $transaction->nameOnCard = $request->nameOnCard;
            $transaction->mm_yy = $request->mm_yy;
            $transaction->allInfo = $intent;
            $transaction->save();
            return response()->json([$response], 201);
        } catch (Exception $ex) {
            return response()->json(['msg' => 'error'], 500);
        }
    }

    public function getAllBalanceTransfer ()
    {
        Stripe\Stripe::setApiKey(env("STRIPE_SECRET"));
        $balanceTransferHistory = \Stripe\Customer::allBalanceTransactions('cus_4fdAW5ftNQow1a');
    }
}
