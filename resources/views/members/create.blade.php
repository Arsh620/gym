@extends('layouts.app')

@section('title', 'Add Member')

@section('content')
<h1>Add New Member</h1>

<div class="card" style="max-width: 600px; margin: 0 auto;">
    <form action="/members" method="POST">
        @csrf
        
        <div class="form-group">
            <label>User</label>
            <select name="user_id" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" required>
        </div>

        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" name="date_of_birth" required>
        </div>

        <div class="form-group">
            <label>Gender</label>
            <select name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label>Emergency Contact</label>
            <input type="text" name="emergency_contact" required>
        </div>

        <div class="form-group">
            <label>Emergency Phone</label>
            <input type="text" name="emergency_phone" required>
        </div>

        <div style="display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/members" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
