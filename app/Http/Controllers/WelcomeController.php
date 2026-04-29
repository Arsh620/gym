<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        
        if ($user->isAdmin()) {
            return redirect('/admin/dashboard');
        }
        
        $member = $user->member;
        $membership = $member ? $member->memberships()->latest()->first() : null;
        
        return view('welcome-member', compact('user', 'member', 'membership'));
    }
}