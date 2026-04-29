@extends('layouts.app')

@section('title', 'Admin Dashboard - FitZone')

@section('content')
<div style="padding: 2rem 0;">
    <!-- Header -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 style="color: #e74c3c; font-size: 2.5rem;">Admin Dashboard</h1>
        <a href="/logout" class="btn btn-secondary">Logout</a>
    </div>

    <!-- Stats Cards -->
    <div class="grid-4" style="margin-bottom: 2rem;">
        <div class="stat-card">
            <h3>Total Members</h3>
            <div class="stat-value" style="color: #e74c3c;">{{ $stats['total_members'] }}</div>
        </div>
        <div class="stat-card">
            <h3>Active Members</h3>
            <div class="stat-value" style="color: #27ae60;">{{ $stats['active_members'] }}</div>
        </div>
        <div class="stat-card">
            <h3>Trainers</h3>
            <div class="stat-value" style="color: #3498db;">{{ $stats['total_trainers'] }}</div>
        </div>
        <div class="stat-card">
            <h3>Classes</h3>
            <div class="stat-value" style="color: #f39c12;">{{ $stats['total_classes'] }}</div>
        </div>
    </div>

    <!-- Revenue Cards -->
    <div class="grid-2" style="margin-bottom: 2rem;">
        <div class="stat-card">
            <h3>Today's Revenue</h3>
            <div class="stat-value" style="color: #27ae60;">${{ number_format($stats['today_revenue'], 2) }}</div>
        </div>
        <div class="stat-card">
            <h3>Monthly Revenue</h3>
            <div class="stat-value" style="color: #27ae60;">${{ number_format($stats['monthly_revenue'], 2) }}</div>
        </div>
    </div>

    <div class="grid-2">
        <!-- Recent Members -->
        <div class="card">
            <div class="flex-between">
                <h2>Recent Members</h2>
                <a href="/admin/members" class="btn btn-secondary">View All</a>
            </div>
            @forelse($recentMembers as $member)
                <div style="background: #2a2a2a; padding: 1rem; border-radius: 6px; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <h4 style="color: #fff;">{{ $member->user->name }}</h4>
                        <p style="color: #888; font-size: 0.9rem;">{{ $member->user->email }}</p>
                    </div>
                    <span style="color: #888; font-size: 0.8rem;">{{ $member->created_at->diffForHumans() }}</span>
                </div>
            @empty
                <p style="color: #888; text-align: center; padding: 2rem;">No members found</p>
            @endforelse
        </div>

        <!-- Upcoming Classes -->
        <div class="card">
            <div class="flex-between">
                <h2>Upcoming Classes</h2>
                <a href="/admin/gym-classes" class="btn btn-secondary">View All</a>
            </div>
            @forelse($upcomingClasses as $class)
                <div style="background: #2a2a2a; padding: 1rem; border-radius: 6px; margin-bottom: 1rem;">
                    <h4 style="color: #fff; margin-bottom: 0.5rem;">{{ $class->name }}</h4>
                    <p style="color: #888; font-size: 0.9rem;">with {{ $class->trainer->name ?? 'No trainer' }}</p>
                    <p style="color: #e74c3c; font-size: 0.9rem;">{{ $class->start_time->format('M d, H:i') }}</p>
                </div>
            @empty
                <p style="color: #888; text-align: center; padding: 2rem;">No upcoming classes</p>
            @endforelse
        </div>
    </div>
</div>
@endsection