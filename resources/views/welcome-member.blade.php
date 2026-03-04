@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<style>
.welcome-container {
    max-width: 800px;
    margin: 3rem auto;
    text-align: center;
}

.welcome-icon {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
}

.welcome-icon svg {
    width: 60px;
    height: 60px;
    color: white;
}

.welcome-container h1 {
    font-size: 2.5rem;
    color: #2c3e50;
    margin-bottom: 1rem;
}

.welcome-container p {
    font-size: 1.2rem;
    color: #7f8c8d;
    margin-bottom: 3rem;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.info-card {
    background: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.info-card h3 {
    color: #3498db;
    margin-bottom: 1rem;
}

.info-card p {
    color: #7f8c8d;
    font-size: 1rem;
}
</style>

<div class="welcome-container">
    <div class="welcome-icon">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
    </div>
    
    <h1>Welcome to Our Gym!</h1>
    <p>Your membership is now active. Get ready to start your fitness journey!</p>
    
    <div class="card" style="max-width: 600px; margin: 0 auto; text-align: left;">
        <h2 style="margin-bottom: 1.5rem;">What's Next?</h2>
        <ul style="list-style: none; padding: 0;">
            <li style="padding: 1rem 0; border-bottom: 1px solid #ecf0f1;">
                <strong>📧 Check Your Email</strong><br>
                <span style="color: #7f8c8d;">We've sent you a confirmation email with your membership details.</span>
            </li>
            <li style="padding: 1rem 0; border-bottom: 1px solid #ecf0f1;">
                <strong>🏋️ Visit Our Gym</strong><br>
                <span style="color: #7f8c8d;">Come to our location and start your first workout session.</span>
            </li>
            <li style="padding: 1rem 0; border-bottom: 1px solid #ecf0f1;">
                <strong>👨‍🏫 Meet Your Trainer</strong><br>
                <span style="color: #7f8c8d;">Our trainers will help you create a personalized workout plan.</span>
            </li>
            <li style="padding: 1rem 0;">
                <strong>📅 Book Classes</strong><br>
                <span style="color: #7f8c8d;">Join our group classes and meet other members.</span>
            </li>
        </ul>
    </div>

    <div class="info-grid">
        <div class="info-card">
            <h3>Gym Hours</h3>
            <p>Monday - Friday: 6 AM - 10 PM<br>
            Saturday - Sunday: 8 AM - 8 PM</p>
        </div>
        
        <div class="info-card">
            <h3>Contact Us</h3>
            <p>Phone: (123) 456-7890<br>
            Email: info@gym.com</p>
        </div>
    </div>

    <div style="margin-top: 3rem;">
        <a href="/" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.1rem;">Back to Home</a>
    </div>
</div>
@endsection
