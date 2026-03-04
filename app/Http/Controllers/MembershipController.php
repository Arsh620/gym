<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::with(['member.user', 'plan'])->paginate(15);
        return view('memberships.index', compact('memberships'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'plan_id' => 'required|exists:plans,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        return Membership::create($validated);
    }

    public function show(Membership $membership)
    {
        return $membership->load(['member.user', 'plan']);
    }

    public function update(Request $request, Membership $membership)
    {
        $validated = $request->validate([
            'end_date' => 'date|after:start_date',
            'status' => 'in:active,expired,cancelled',
        ]);

        $membership->update($validated);
        return $membership;
    }

    public function destroy(Membership $membership)
    {
        $membership->delete();
        return response()->noContent();
    }
}
