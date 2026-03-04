<?php

namespace App\Http\Controllers;

use App\Models\ClassBooking;
use Illuminate\Http\Request;

class ClassBookingController extends Controller
{
    public function index()
    {
        return ClassBooking::with(['gymClass', 'member.user'])->paginate(15);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gym_class_id' => 'required|exists:gym_classes,id',
            'member_id' => 'required|exists:members,id',
            'booking_date' => 'required|date',
        ]);

        return ClassBooking::create($validated);
    }

    public function show(ClassBooking $classBooking)
    {
        return $classBooking->load(['gymClass', 'member.user']);
    }

    public function update(Request $request, ClassBooking $classBooking)
    {
        $validated = $request->validate([
            'status' => 'in:confirmed,cancelled,attended',
        ]);

        $classBooking->update($validated);
        return $classBooking;
    }

    public function destroy(ClassBooking $classBooking)
    {
        $classBooking->delete();
        return response()->noContent();
    }
}
