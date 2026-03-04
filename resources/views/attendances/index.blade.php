@extends('layouts.app')

@section('title', 'Attendance')

@section('content')
<div class="space-y-6">
    <h1 class="text-3xl font-bold text-gray-900">Attendance</h1>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Member</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Check In</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Check Out</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($attendances as $attendance)
                <tr>
                    <td class="px-6 py-4">{{ $attendance->member->user->name }}</td>
                    <td class="px-6 py-4">{{ $attendance->check_in }}</td>
                    <td class="px-6 py-4">{{ $attendance->check_out ?? 'In gym' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">No records</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
