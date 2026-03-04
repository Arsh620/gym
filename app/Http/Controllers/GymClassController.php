<?php

namespace App\Http\Controllers;

use App\Models\GymClass;
use Illuminate\Http\Request;

class GymClassController extends Controller
{
    public function index()
    {
        $classes = GymClass::with('trainer.user')->where('status', 'active')->get();
        return view('gym-classes.index', compact('classes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'trainer_id' => 'required|exists:trainers,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'schedule_day' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'capacity' => 'required|integer|min:1',
        ]);

        return GymClass::create($validated);
    }

    public function show(GymClass $gymClass)
    {
        return $gymClass->load(['trainer.user', 'bookings']);
    }

    public function update(Request $request, GymClass $gymClass)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'description' => 'nullable|string',
            'schedule_day' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'start_time' => 'date_format:H:i',
            'end_time' => 'date_format:H:i|after:start_time',
            'capacity' => 'integer|min:1',
            'status' => 'in:active,cancelled',
        ]);

        $gymClass->update($validated);
        return $gymClass;
    }

    public function destroy(GymClass $gymClass)
    {
        $gymClass->delete();
        return response()->noContent();
    }
}
