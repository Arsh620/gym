@extends('layouts.app')

@section('title', 'Memberships')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">Memberships</h1>
        <a href="/memberships/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">New Membership</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Member</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Plan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Start Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">End Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($memberships as $membership)
                <tr>
                    <td class="px-6 py-4">{{ $membership->member->user->name }}</td>
                    <td class="px-6 py-4">{{ $membership->plan->name }}</td>
                    <td class="px-6 py-4">{{ $membership->start_date }}</td>
                    <td class="px-6 py-4">{{ $membership->end_date }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">
                            {{ ucfirst($membership->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No memberships</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
