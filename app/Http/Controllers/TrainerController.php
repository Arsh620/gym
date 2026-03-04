<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::with('user')->where('status', 'active')->get();
        return view('trainers.index', compact('trainers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'specialization' => 'required|string',
            'phone' => 'required|string',
            'hire_date' => 'required|date',
        ]);

        return Trainer::create($validated);
    }

    public function show(Trainer $trainer)
    {
        return $trainer->load(['user', 'classes']);
    }

    public function update(Request $request, Trainer $trainer)
    {
        $validated = $request->validate([
            'specialization' => 'string',
            'phone' => 'string',
            'status' => 'in:active,inactive',
        ]);

        $trainer->update($validated);
        return $trainer;
    }

    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        return response()->noContent();
    }
}
