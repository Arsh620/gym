<?php

namespace App\Services;

use App\Models\Member;
use App\Models\Plan;
use App\Models\Membership;
use App\Models\Payment;
use Carbon\Carbon;

class GymBusinessService
{
    public function getActiveMembers()
    {
        return Member::whereHas('memberships', function($query) {
            $query->where('status', 'active')
                  ->where('end_date', '>=', now());
        })->count();
    }

    public function getExpiringMemberships($days = 7)
    {
        return Membership::where('status', 'active')
            ->whereBetween('end_date', [now(), now()->addDays($days)])
            ->with(['member.user', 'plan'])
            ->get();
    }

    public function calculateMembershipRevenue($period = 'month')
    {
        $query = Payment::where('status', 'completed');
        
        switch($period) {
            case 'today':
                $query->whereDate('created_at', today());
                break;
            case 'week':
                $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'month':
                $query->whereMonth('created_at', now()->month);
                break;
            case 'year':
                $query->whereYear('created_at', now()->year);
                break;
        }
        
        return $query->sum('amount');
    }

    public function getMembershipStats()
    {
        return [
            'total_members' => Member::count(),
            'active_members' => $this->getActiveMembers(),
            'expired_members' => Member::whereHas('memberships', function($query) {
                $query->where('end_date', '<', now());
            })->count(),
            'new_members_this_month' => Member::whereMonth('created_at', now()->month)->count(),
        ];
    }

    public function getPopularPlans()
    {
        return Plan::withCount('memberships')
            ->where('status', 'active')
            ->orderBy('memberships_count', 'desc')
            ->take(3)
            ->get();
    }

    public function renewMembership(Member $member, Plan $plan)
    {
        // End current membership
        $currentMembership = $member->memberships()->where('status', 'active')->first();
        if ($currentMembership) {
            $currentMembership->update(['status' => 'expired']);
        }

        // Create new membership
        return Membership::create([
            'member_id' => $member->id,
            'plan_id' => $plan->id,
            'start_date' => now(),
            'end_date' => now()->addDays($plan->duration_days),
            'status' => 'active'
        ]);
    }

    public function checkMemberAccess(Member $member)
    {
        $activeMembership = $member->memberships()
            ->where('status', 'active')
            ->where('end_date', '>=', now())
            ->first();

        return [
            'has_access' => !is_null($activeMembership),
            'membership' => $activeMembership,
            'expires_at' => $activeMembership?->end_date,
            'days_remaining' => $activeMembership ? now()->diffInDays($activeMembership->end_date) : 0
        ];
    }
}