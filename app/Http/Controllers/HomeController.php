<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\GymClass;
use App\Models\Trainer;
use App\Services\GymBusinessService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $gymService;

    public function __construct(GymBusinessService $gymService)
    {
        $this->gymService = $gymService;
    }

    public function index()
    {
        $featuredPlans = Plan::where('status', 'active')
            ->orderBy('price')
            ->take(3)
            ->get();

        $upcomingClasses = GymClass::with('trainer')
            ->where('start_time', '>=', now())
            ->orderBy('start_time')
            ->take(6)
            ->get();

        $trainers = Trainer::where('status', 'active')
            ->take(4)
            ->get();

        $stats = [
            'active_members' => $this->gymService->getActiveMembers(),
            'total_classes' => GymClass::count(),
            'expert_trainers' => Trainer::where('status', 'active')->count(),
            'years_experience' => 10
        ];

        return view('home', compact('featuredPlans', 'upcomingClasses', 'trainers', 'stats'));
    }
}