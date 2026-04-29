<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GymClass;
use App\Models\Membership;
use App\Services\GymBusinessService;

class MemberDashboardController extends Controller
{
    protected $gymService;

    public function __construct(GymBusinessService $gymService)
    {
        $this->gymService = $gymService;
    }

    public function index()
    {
        $user = auth()->user();
        $member = $user->member;
        
        if (!$member) {
            return redirect('/')->with('error', 'Member profile not found');
        }

        $activeMembership = $member->memberships()
            ->where('status', 'active')
            ->where('end_date', '>=', now())
            ->with('plan')
            ->first();

        $upcomingClasses = GymClass::with('trainer')
            ->where('start_time', '>=', now())
            ->orderBy('start_time')
            ->take(5)
            ->get();

        $memberAccess = $this->gymService->checkMemberAccess($member);

        return view('member.dashboard', compact('member', 'activeMembership', 'upcomingClasses', 'memberAccess'));
    }
}