@extends('layouts.app')

@section('title', 'Member Dashboard - FitZone')

@section('content')
<div style="padding: 2rem 0;">
    <!-- Header -->
    <div style="background: linear-gradient(135deg, #e74c3c, #c0392b); padding: 2rem; border-radius: 12px; margin-bottom: 2rem; color: white;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Welcome, {{ $member->user->name }}!</h1>
                <p style="opacity: 0.9;">Your fitness journey continues</p>
            </div>
            <a href="/logout" style="background: rgba(255,255,255,0.2); padding: 0.5rem 1rem; border-radius: 6px; color: white; text-decoration: none;">Logout</a>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
        <!-- Left Column -->
        <div>
            <!-- Membership Status -->
            <div class="card" style="margin-bottom: 2rem;">
                <h2 style="color: #e74c3c; margin-bottom: 1rem;">Membership Status</h2>
                @if($activeMembership)
                    <div style="background: #2a2a2a; padding: 1.5rem; border-radius: 8px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                            <h3 style="color: #fff;">{{ $activeMembership->plan->name }} Plan</h3>
                            <span class="badge badge-success">Active</span>
                        </div>
                        <p style="color: #888; margin-bottom: 1rem;">{{ $activeMembership->plan->description }}</p>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div>
                                <strong style="color: #ccc;">Start Date:</strong><br>
                                <span style="color: #888;">{{ $activeMembership->start_date->format('M d, Y') }}</span>
                            </div>
                            <div>
                                <strong style="color: #ccc;">Expires:</strong><br>
                                <span style="color: #888;">{{ $activeMembership->end_date->format('M d, Y') }}</span>
                            </div>
                        </div>
                        @if($memberAccess['days_remaining'] <= 7)
                            <div style="background: #e74c3c; padding: 1rem; border-radius: 6px; margin-top: 1rem; color: white;">
                                ⚠️ Your membership expires in {{ $memberAccess['days_remaining'] }} days!
                            </div>
                        @endif
                    </div>
                @else
                    <div style="background: #2a2a2a; padding: 1.5rem; border-radius: 8px; text-align: center;">
                        <p style="color: #888; margin-bottom: 1rem;">No active membership found</p>
                        <a href="/plans" class="btn btn-primary">Choose a Plan</a>
                    </div>
                @endif
            </div>

            <!-- Quick Stats -->
            <div class="card">
                <h2 style="color: #e74c3c; margin-bottom: 1rem;">Quick Stats</h2>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="stat-card">
                        <h3>Access Status</h3>
                        <div class="stat-value" style="color: {{ $memberAccess['has_access'] ? '#27ae60' : '#e74c3c' }};">
                            {{ $memberAccess['has_access'] ? 'Active' : 'Expired' }}
                        </div>
                    </div>
                    <div class="stat-card">
                        <h3>Days Remaining</h3>
                        <div class="stat-value">{{ $memberAccess['days_remaining'] }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div>
            <!-- Upcoming Classes -->
            <div class="card">
                <h2 style="color: #e74c3c; margin-bottom: 1rem;">Upcoming Classes</h2>
                @forelse($upcomingClasses as $class)
                    <div style="background: #2a2a2a; padding: 1rem; border-radius: 6px; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <h4 style="color: #fff; margin-bottom: 0.5rem;">{{ $class->name }}</h4>
                            <p style="color: #888; font-size: 0.9rem;">with {{ $class->trainer->name }}</p>
                            <p style="color: #e74c3c; font-size: 0.9rem;">{{ $class->start_time->format('M d, H:i') }}</p>
                        </div>
                        <div style="text-align: right;">
                            <span style="color: #888; font-size: 0.8rem;">{{ $class->duration }} min</span><br>
                            <span style="color: #888; font-size: 0.8rem;">{{ $class->capacity }} spots</span>
                        </div>
                    </div>
                @empty
                    <p style="color: #888; text-align: center; padding: 2rem;">No upcoming classes</p>
                @endforelse
                <a href="/admin/gym-classes" class="btn btn-secondary" style="width: 100%; margin-top: 1rem;">View All Classes</a>
            </div>
        </div>
    </div>
</div>

<style>
@media (max-width: 768px) {
    div[style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
    }
}
</style>
@endsection