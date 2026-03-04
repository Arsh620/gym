@extends('layouts.app')

@section('title', 'Equipment')

@section('content')
<div class="flex-between">
    <h1>Equipment</h1>
    <a href="/equipment/create" class="btn btn-primary">Add Equipment</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Purchase Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($equipment as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->purchase_date }}</td>
                <td>
                    <span class="badge 
                        {{ $item->status === 'available' ? 'badge-success' : '' }}
                        {{ $item->status === 'maintenance' ? 'badge-warning' : '' }}
                        {{ $item->status === 'broken' ? 'badge-danger' : '' }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td>
                    <a href="/equipment/{{ $item->id }}/edit" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Edit</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No equipment found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
