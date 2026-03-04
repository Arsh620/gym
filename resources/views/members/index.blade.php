@extends('layouts.app')

@section('title', 'Members')

@section('content')
<div class="flex-between">
    <h1>Members</h1>
    <a href="/members/create" class="btn btn-primary">Add Member</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
            <tr>
                <td>{{ $member->user->name }}</td>
                <td>{{ $member->user->email }}</td>
                <td>{{ $member->phone }}</td>
                <td>
                    <span class="badge {{ $member->status === 'active' ? 'badge-success' : 'badge-danger' }}">
                        {{ ucfirst($member->status) }}
                    </span>
                </td>
                <td>
                    <a href="/members/{{ $member->id }}" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.9rem;">View</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No members found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
