<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::with('user')->paginate(15);
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $users = \App\Models\User::doesntHave('member')->get();
        return view('members.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'phone' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'address' => 'nullable|string',
            'emergency_contact' => 'required|string',
            'emergency_phone' => 'required|string',
        ]);

        return Member::create($validated);
    }

    public function show(Member $member)
    {
        $member->load(['user', 'memberships.plan', 'payments', 'attendances']);
        return view('members.show', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'phone' => 'string',
            'address' => 'nullable|string',
            'emergency_contact' => 'string',
            'emergency_phone' => 'string',
            'status' => 'in:active,inactive,suspended',
        ]);

        $member->update($validated);
        return $member;
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return response()->noContent();
    }
}
