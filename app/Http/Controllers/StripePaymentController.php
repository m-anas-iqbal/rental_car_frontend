<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('admin.pages.stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $req)
    {
        try {
            // dd($req);
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $payment = Stripe\Charge::create([
                "amount" => $req->amount*100,
                "currency" => "AED",
                "source" => $req->stripeToken,
                "description" => "Test payment"
            ]);
            if ($payment) {
                return response()->json([
                    'status' => true,
                    'message' => "successfully payment",
                    'str_id' => $payment->id,

                ], 200);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "payment failed",

                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),

            ], 200);
        }
    }
}
