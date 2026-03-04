<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('member.user')->latest()->paginate(15);
        return view('attendances.index', compact('attendances'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'check_in' => 'required|date',
        ]);

        return Attendance::create($validated);
    }

    public function show(Attendance $attendance)
    {
        return $attendance->load('member.user');
    }

    public function update(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'check_out' => 'date|after:check_in',
        ]);

        $attendance->update($validated);
        return $attendance;
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return response()->noContent();
    }
}
