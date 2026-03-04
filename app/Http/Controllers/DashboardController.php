<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Membership;
use App\Models\Trainer;
use App\Models\Attendance;
use App\Models\Payment;
use App\Models\GymClass;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'members' => Member::where('status', 'active')->count(),
            'memberships' => Membership::where('status', 'active')->count(),
            'trainers' => Trainer::where('status', 'active')->count(),
            'attendance' => Attendance::whereDate('check_in', today())->count(),
        ];

        $recentPayments = Payment::with('member.user')
            ->latest()
            ->take(5)
            ->get();

        $upcomingClasses = GymClass::with('trainer.user')
            ->where('status', 'active')
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'recentPayments', 'upcomingClasses'));
    }
}
