@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard</h1>

<div class="grid-4">
    <div class="stat-card">
        <h3>Total Members</h3>
        <p class="stat-value" style="color: #3498db;">{{ $stats['members'] ?? 0 }}</p>
    </div>
    <div class="stat-card">
        <h3>Active Memberships</h3>
        <p class="stat-value" style="color: #27ae60;">{{ $stats['memberships'] ?? 0 }}</p>
    </div>
    <div class="stat-card">
        <h3>Total Trainers</h3>
        <p class="stat-value" style="color: #9b59b6;">{{ $stats['trainers'] ?? 0 }}</p>
    </div>
    <div class="stat-card">
        <h3>Today's Attendance</h3>
        <p class="stat-value" style="color: #e67e22;">{{ $stats['attendance'] ?? 0 }}</p>
    </div>
</div>

<div class="grid-2">
    <div class="card">
        <h2>Recent Payments</h2>
        <table>
            <thead>
                <tr>
                    <th>Member</th>
                    <th>Date</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentPayments ?? [] as $payment)
                <tr>
                    <td>{{ $payment->member->user->name }}</td>
                    <td>{{ $payment->payment_date }}</td>
                    <td style="color: #27ae60; font-weight: bold;">${{ $payment->amount }}</td>
                </tr>
                @empty
                <tr><td colspan="3" class="text-center">No recent payments</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card">
        <h2>Upcoming Classes</h2>
        <table>
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Day</th>
                    <th>Trainer</th>
                </tr>
            </thead>
            <tbody>
                @forelse($upcomingClasses ?? [] as $class)
                <tr>
                    <td>{{ $class->name }}</td>
                    <td>{{ ucfirst($class->schedule_day) }}</td>
                    <td>{{ $class->trainer->user->name }}</td>
                </tr>
                @empty
                <tr><td colspan="3" class="text-center">No upcoming classes</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
