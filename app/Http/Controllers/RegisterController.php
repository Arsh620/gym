<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'address' => 'nullable|string',
            'emergency_contact' => 'required|string',
            'emergency_phone' => 'required|string',
            'plan_id' => 'required|exists:plans,id',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $member = Member::create([
            'user_id' => $user->id,
            'phone' => $validated['phone'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'address' => $validated['address'],
            'emergency_contact' => $validated['emergency_contact'],
            'emergency_phone' => $validated['emergency_phone'],
        ]);

        $plan = \App\Models\Plan::find($validated['plan_id']);
        
        Membership::create([
            'member_id' => $member->id,
            'plan_id' => $validated['plan_id'],
            'start_date' => now(),
            'end_date' => now()->addDays($plan->duration_days),
        ]);

        return redirect('/dashboard')->with('success', 'Registration successful!');
    }
}
