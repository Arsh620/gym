@extends('layouts.app')

@section('title', 'Trainers')

@section('content')
<div class="flex-between">
    <h1>Trainers</h1>
    <a href="/trainers/create" class="btn btn-primary">Add Trainer</a>
</div>

<div class="grid-3">
    @forelse($trainers as $trainer)
    <div class="card">
        <h3>{{ $trainer->user->name }}</h3>
        <p style="color: #7f8c8d;">{{ $trainer->specialization }}</p>
        <p style="font-size: 0.9rem; color: #95a5a6;">{{ $trainer->phone }}</p>
        <div style="margin-top: 1rem;">
            <span class="badge {{ $trainer->status === 'active' ? 'badge-success' : 'badge-danger' }}">
                {{ ucfirst($trainer->status) }}
            </span>
        </div>
    </div>
    @empty
    <div class="empty-state" style="grid-column: 1 / -1;">No trainers found</div>
    @endforelse
</div>
@endsection
