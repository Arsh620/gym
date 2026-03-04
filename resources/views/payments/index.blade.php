@extends('layouts.app')

@section('title', 'Payments')

@section('content')
<div class="space-y-6">
    <h1 class="text-3xl font-bold text-gray-900">Payments</h1>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Member</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Method</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($payments as $payment)
                <tr>
                    <td class="px-6 py-4">{{ $payment->member->user->name }}</td>
                    <td class="px-6 py-4 font-bold">${{ $payment->amount }}</td>
                    <td class="px-6 py-4">{{ $payment->payment_date }}</td>
                    <td class="px-6 py-4">{{ ucfirst($payment->payment_method) }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">
                            {{ ucfirst($payment->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No payments</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
