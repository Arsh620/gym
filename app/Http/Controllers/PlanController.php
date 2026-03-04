<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::where('status', 'active')->get();
        return view('plans.index', compact('plans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration_days' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        return Plan::create($validated);
    }

    public function show(Plan $plan)
    {
        return $plan;
    }

    public function update(Request $request, Plan $plan)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'description' => 'nullable|string',
            'duration_days' => 'integer|min:1',
            'price' => 'numeric|min:0',
            'status' => 'in:active,inactive',
        ]);

        $plan->update($validated);
        return $plan;
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return response()->noContent();
    }
}
