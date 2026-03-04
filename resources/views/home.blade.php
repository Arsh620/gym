@extends('layouts.app')

@section('title', 'FitZone - Transform Your Body, Transform Your Life')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">Transform Your Body,<br><span class="highlight">Transform Your Life</span></h1>
        <p class="hero-subtitle">Join FitZone and discover the strongest version of yourself with our world-class facilities, expert trainers, and supportive community.</p>
        <div class="hero-buttons">
            <a href="/plans" class="btn btn-primary btn-large">Start Your Journey</a>
            <a href="#classes" class="btn btn-secondary btn-large">View Classes</a>
        </div>
        <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-number">{{ $stats['active_members'] }}+</span>
                <span class="stat-label">Active Members</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">{{ $stats['expert_trainers'] }}+</span>
                <span class="stat-label">Expert Trainers</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">{{ $stats['years_experience'] }}+</span>
                <span class="stat-label">Years Experience</span>
            </div>
        </div>
    </div>
    <div class="hero-image">
        <img src="/images/samuel-girven-VJ2s0c20qCo-unsplash.jpg" alt="Fitness Training" class="hero-img">
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="section-header">
        <h2>Why Choose FitZone?</h2>
        <p>We provide everything you need to achieve your fitness goals</p>
    </div>
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">🏋️</div>
            <h3>Modern Equipment</h3>
            <p>State-of-the-art fitness equipment maintained to the highest standards</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">👨‍🏫</div>
            <h3>Expert Trainers</h3>
            <p>Certified professionals dedicated to helping you reach your goals safely</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">⏰</div>
            <h3>Flexible Hours</h3>
            <p>Open 24/7 to fit your busy schedule and lifestyle</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🎯</div>
            <h3>Personal Training</h3>
            <p>One-on-one sessions tailored to your specific needs and goals</p>
        </div>
    </div>
</section>

<!-- Plans Section -->
<section class="plans-section">
    <div class="section-header">
        <h2>Choose Your Plan</h2>
        <p>Flexible membership options to suit your lifestyle</p>
    </div>
    <div class="plans-grid">
        @foreach($featuredPlans as $plan)
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
                <li>✓ Group fitness classes</li>
                <li>✓ Locker room access</li>
                @if($loop->index >= 1)
                    <li>✓ Personal training session</li>
                @endif
                @if($loop->index >= 2)
                    <li>✓ Nutrition consultation</li>
                    <li>✓ Priority booking</li>
                @endif
            </ul>
            <a href="/register?plan={{ $plan->id }}" class="btn btn-plan">Get Started</a>
        </div>
        @endforeach
    </div>
</section>

<!-- Classes Section -->
<section id="classes" class="classes-section">
    <div class="section-header">
        <h2>Upcoming Classes</h2>
        <p>Join our energizing group fitness sessions</p>
    </div>
    <div class="classes-grid">
        @foreach($upcomingClasses->take(6) as $class)
        <div class="class-card">
            <div class="class-time">
                <span class="class-date">{{ $class->date->format('M d') }}</span>
                <span class="class-hour">{{ $class->date->format('H:i') }}</span>
            </div>
            <div class="class-info">
                <h4>{{ $class->name }}</h4>
                <p class="class-trainer">with {{ $class->trainer->name }}</p>
                <p class="class-description">{{ Str::limit($class->description, 80) }}</p>
                <div class="class-meta">
                    <span class="class-duration">{{ $class->duration }} min</span>
                    <span class="class-capacity">{{ $class->capacity }} spots</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-center" style="margin-top: 2rem;">
        <a href="/admin/gym-classes" class="btn btn-secondary">View All Classes</a>
    </div>
</section>

<!-- Trainers Section -->
<section class="trainers-section">
    <div class="section-header">
        <h2>Meet Our Trainers</h2>
        <p>Expert guidance from certified fitness professionals</p>
    </div>
    <div class="trainers-grid">
        @foreach($trainers as $trainer)
        <div class="trainer-card">
            <div class="trainer-image">
                <img src="/images/trainer-placeholder.jpg" alt="{{ $trainer->name }}" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIyMDAiIGhlaWdodD0iMjAwIiBmaWxsPSIjMzMzIi8+Cjx0ZXh0IHg9IjEwMCIgeT0iMTEwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSIjNjY2IiBmb250LXNpemU9IjE0Ij5UcmFpbmVyPC90ZXh0Pgo8L3N2Zz4='">
            </div>
            <div class="trainer-info">
                <h4>{{ $trainer->name }}</h4>
                <p class="trainer-specialty">{{ $trainer->specialization }}</p>
                <p class="trainer-experience">{{ $trainer->experience_years }} years experience</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="cta-content">
        <h2>Ready to Start Your Fitness Journey?</h2>
        <p>Join thousands of members who have transformed their lives at FitZone</p>
        <a href="/register" class="btn btn-primary btn-large">Join Now</a>
    </div>
</section>
@endsection
