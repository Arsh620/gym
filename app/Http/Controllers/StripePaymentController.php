<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;

class StripePaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function checkout(Request $request)
    {
        $plan = \App\Models\Plan::findOrFail($request->plan_id);

        $session = Session::create([
            'payment_method_types' => ['card'],
            'customer_email' => $request->email,
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $plan->name,
                        'description' => $plan->description,
                    ],
                    'unit_amount' => $plan->price * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url('/payment/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url' => url('/payment/cancel'),
            'metadata' => [
                'plan_id' => $plan->id,
                'user_data' => json_encode($request->except(['_token', 'plan_id'])),
            ],
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $session = Session::retrieve($request->session_id);
        
        if ($session->payment_status === 'paid') {
            $userData = json_decode($session->metadata->user_data, true);
            
            $user = \App\Models\User::where('email', $userData['email'])->first();
            
            if (!$user) {
                $user = \App\Models\User::create([
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'password' => \Hash::make($userData['password']),
                ]);

                $member = \App\Models\Member::create([
                    'user_id' => $user->id,
                    'phone' => $userData['phone'],
                    'date_of_birth' => $userData['date_of_birth'],
                    'gender' => $userData['gender'],
                    'address' => $userData['address'] ?? null,
                    'emergency_contact' => $userData['emergency_contact'],
                    'emergency_phone' => $userData['emergency_phone'],
                ]);

                $plan = \App\Models\Plan::find($session->metadata->plan_id);
                
                $membership = \App\Models\Membership::create([
                    'member_id' => $member->id,
                    'plan_id' => $plan->id,
                    'start_date' => now(),
                    'end_date' => now()->addDays($plan->duration_days),
                ]);

                \App\Models\Payment::create([
                    'member_id' => $member->id,
                    'membership_id' => $membership->id,
                    'amount' => $plan->price,
                    'payment_date' => now(),
                    'payment_method' => 'card',
                    'status' => 'completed',
                ]);
            }

            Auth::login($user);
            return redirect('/welcome')->with('success', 'Payment successful! Welcome to the gym!');
        }

        return redirect('/payment/cancel');
    }

    public function cancel()
    {
        return view('payment.cancel');
    }
}
