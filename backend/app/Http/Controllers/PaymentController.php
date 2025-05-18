<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Stripe\Stripe;
use Stripe\Charge;
use Exception;

class PaymentController extends Controller
{
    // Simulated payment (no real gateway)
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'amount' => 'required|numeric',
        ]);

        return Payment::create([
            'project_id' => $request->project_id,
            'amount' => $request->amount,
            'status' => 'completed',
        ]);
    }

    // Real Stripe payment
    public function pay(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'amount' => 'required|numeric',
            'token' => 'required|string',
        ]);

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $charge = Charge::create([
                'amount' => $request->amount * 100, // cents
                'currency' => 'usd',
                'description' => 'Project Payment',
                'source' => $request->token,
            ]);

            return Payment::create([
                'project_id' => $request->project_id,
                'amount' => $request->amount,
                'status' => 'completed',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Stripe Error: ' . $e->getMessage(),
            ], 500);
        }
    }
}
