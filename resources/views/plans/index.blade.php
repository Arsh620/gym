@extends('layouts.app')

@section('title', 'Membership Plans - FitZone')

@section('content')
<section style="padding: 3rem 0;">
    <div class="section-header">
        <h1 style="font-size: 3rem; margin-bottom: 1rem;">Choose Your Plan</h1>
        <p style="font-size: 1.2rem; color: #888; max-width: 600px; margin: 0 auto;">Flexible membership options designed to fit your lifestyle and fitness goals</p>
    </div>

    <div class="plans-grid" style="margin-top: 3rem;">
        @forelse($plans as $plan)
        <div class="plan-card {{ $loop->index === 1 ? 'featured' : '' }}">
            @if($loop->index === 1)
                <div class="plan-badge">Most Popular</div>
            @endif
            <h3>{{ $plan->name }}</h3>
            <div class="plan-price">
                <span class="currency">$</span>
                <span class="amount">{{ number_format($plan->price, 0) }}</span>
                <span class="period">/ {{ $plan->duration_days }} days</span>
            </div>
            <p class="plan-description">{{ $plan->description }}</p>
            
            <ul class="plan-features">
                <li>✓ Full gym access</li>
                <li>✓ Locker room facilities</li>
                <li>✓ Group fitness classes</li>
                @if($loop->index >= 1)
                    <li>✓ Personal training consultation</li>
                    <li>✓ Nutrition guidance</li>
                @endif
                @if($loop->index >= 2)
                    <li>✓ Priority class booking</li>
                    <li>✓ Guest passes (2/month)</li>
                    <li>✓ Towel service</li>
                @endif
            </ul>
            
            <a href="/register?plan={{ $plan->id }}" class="btn btn-plan">Select {{ $plan->name }}</a>
        </div>
        @empty
        <div class="empty-state" style="grid-column: 1 / -1;">
            <h3>No Plans Available</h3>
            <p>We're currently updating our membership options. Please check back soon!</p>
        </div>
        @endforelse
    </div>

    <div style="text-align: center; margin-top: 3rem; padding: 2rem; background: #1a1a1a; border-radius: 12px; border: 1px solid #333;">
        <h3 style="margin-bottom: 1rem;">Need Help Choosing?</h3>
        <p style="color: #888; margin-bottom: 1.5rem;">Our fitness consultants are here to help you find the perfect plan</p>
        <a href="tel:555-123-4567" class="btn btn-secondary">Call (555) 123-4567</a>
    </div>
</section>
@endsection
