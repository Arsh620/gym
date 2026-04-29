<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Membership;
use App\Models\Trainer;
use App\Models\Attendance;
use App\Models\Payment;
use App\Models\GymClass;
use App\Services\GymBusinessService;

class DashboardController extends Controller
{
    protected $gymService;

    public function __construct(GymBusinessService $gymService)
    {
        $this->gymService = $gymService;
    }

    public function index()
    {
        $stats = [
            'total_members' => Member::count(),
            'active_members' => $this->gymService->getActiveMembers(),
            'total_trainers' => Trainer::where('status', 'active')->count(),
            'total_classes' => GymClass::count(),
            'monthly_revenue' => $this->gymService->calculateMembershipRevenue('month'),
            'today_revenue' => $this->gymService->calculateMembershipRevenue('today')
        ];

        $recentMembers = Member::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $upcomingClasses = GymClass::with('trainer')
            ->where('start_time', '>=', now())
            ->orderBy('start_time')
            ->take(5)
            ->get();

        $expiringMemberships = $this->gymService->getExpiringMemberships(7);
        $popularPlans = $this->gymService->getPopularPlans();

        return view('admin.dashboard', compact(
            'stats', 'recentMembers', 'upcomingClasses', 'expiringMemberships', 'popularPlans'
        ));
    }
}
