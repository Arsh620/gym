@extends('layouts.app')

@section('title', 'Member Details')

@section('content')
<div class="flex-between">
    <h1>Member Details</h1>
    <a href="/members/{{ $member->id }}/edit" class="btn btn-primary">Edit</a>
</div>

<div class="grid-2">
    <div class="card">
        <h2>Personal Information</h2>
        <p><strong>Name:</strong> {{ $member->user->name }}</p>
        <p><strong>Email:</strong> {{ $member->user->email }}</p>
        <p><strong>Phone:</strong> {{ $member->phone }}</p>
        <p><strong>Date of Birth:</strong> {{ $member->date_of_birth }}</p>
        <p><strong>Gender:</strong> {{ ucfirst($member->gender) }}</p>
        <p><strong>Address:</strong> {{ $member->address }}</p>
        <p><strong>Status:</strong> <span class="badge {{ $member->status === 'active' ? 'badge-success' : 'badge-danger' }}">{{ ucfirst($member->status) }}</span></p>
    </div>

    <div class="card">
        <h2>Emergency Contact</h2>
        <p><strong>Contact Name:</strong> {{ $member->emergency_contact }}</p>
        <p><strong>Contact Phone:</strong> {{ $member->emergency_phone }}</p>
    </div>
</div>

<div class="card">
    <h2>Active Memberships</h2>
    <table>
        <thead>
            <tr>
                <th>Plan</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($member->memberships as $membership)
            <tr>
                <td>{{ $membership->plan->name }}</td>
                <td>{{ $membership->start_date }}</td>
                <td>{{ $membership->end_date }}</td>
                <td><span class="badge badge-success">{{ ucfirst($membership->status) }}</span></td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center">No memberships</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="card">
    <h2>Recent Attendance</h2>
    <table>
        <thead>
            <tr>
                <th>Check In</th>
                <th>Check Out</th>
            </tr>
        </thead>
        <tbody>
            @forelse($member->attendances->take(10) as $attendance)
            <tr>
                <td>{{ $attendance->check_in }}</td>
                <td>{{ $attendance->check_out ?? 'Still in gym' }}</td>
            </tr>
            @empty
            <tr><td colspan="2" class="text-center">No attendance records</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
