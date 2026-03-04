@extends('layouts.app')

@section('title', 'Gym Classes')

@section('content')
<div class="flex-between">
    <h1>Gym Classes</h1>
    <a href="/gym-classes/create" class="btn btn-primary">Add Class</a>
</div>

<div class="schedule-grid">
    @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
    <div class="day-column">
        <h3>{{ ucfirst($day) }}</h3>
        @foreach($classes->where('schedule_day', $day) as $class)
        <div class="class-item">
            <p style="font-weight: bold;">{{ $class->name }}</p>
            <p style="font-size: 0.85rem; color: #555;">{{ date('H:i', strtotime($class->start_time)) }}</p>
            <p style="font-size: 0.85rem; color: #777;">{{ $class->trainer->user->name }}</p>
            <p style="font-size: 0.85rem; color: #999;">{{ $class->capacity }} spots</p>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
@endsection
