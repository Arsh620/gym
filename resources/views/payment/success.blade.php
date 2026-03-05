@extends('layouts.app')

@section('title', 'Payment Successful - Welcome to FitZone!')

@section('content')
<section style="padding: 5rem 0; text-align: center;">
    <div style="max-width: 600px; margin: 0 auto; padding: 0 1rem;">
        <div style="background: #1a1a1a; border-radius: 16px; padding: 3rem 2rem; border: 1px solid #333;">
            <!-- Success Icon -->
            <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #27ae60, #2ecc71); border-radius: 50%; margin: 0 auto 2rem; display: flex; align-items: center; justify-content: center;">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20,6 9,17 4,12"></polyline>
                </svg>
            </div>

            <h1 style="color: #fff; font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem;">Welcome to FitZone!</h1>
            <p style="color: #888; font-size: 1.2rem; margin-bottom: 2rem; line-height: 1.6;">Your payment was successful and your membership is now active. Get ready to transform your life!</p>

            <!-- Next Steps -->
            <div style="background: #2a2a2a; border-radius: 12px; padding: 2rem; margin-bottom: 2rem; text-align: left;">
                <h3 style="color: #e74c3c; font-size: 1.3rem; margin-bottom: 1.5rem; text-align: center;">What's Next?</h3>
                <div style="display: grid; gap: 1rem;">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 32px; height: 32px; background: #e74c3c; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.9rem;">1</div>
                        <span style="color: #ccc;">Check your email for membership details and welcome information</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 32px; height: 32px; background: #e74c3c; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.9rem;">2</div>
                        <span style="color: #ccc;">Visit our gym with a valid ID to activate your access card</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div style="width: 32px; height: 32px; background: #e74c3c; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.9rem;">3</div>
                        <span style="color: #ccc;">Book your first personal training session or group class</span>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div style="background: #2a2a2a; border-radius: 12px; padding: 1.5rem; margin-bottom: 2rem;">
                <h4 style="color: #fff; margin-bottom: 1rem;">Need Help?</h4>
                <p style="color: #888; margin-bottom: 1rem;">Our team is here to support your fitness journey</p>
                <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap;">
                    <div style="text-align: center;">
                        <div style="color: #e74c3c; font-size: 1.2rem; margin-bottom: 0.5rem;">📞</div>
                        <div style="color: #ccc; font-size: 0.9rem;">(555) 123-4567</div>
                    </div>
                    <div style="text-align: center;">
                        <div style="color: #e74c3c; font-size: 1.2rem; margin-bottom: 0.5rem;">✉️</div>
                        <div style="color: #ccc; font-size: 0.9rem;">support@fitzone.com</div>
                    </div>
                    <div style="text-align: center;">
                        <div style="color: #e74c3c; font-size: 1.2rem; margin-bottom: 0.5rem;">📍</div>
                        <div style="color: #ccc; font-size: 0.9rem;">123 Fitness Street</div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="/" class="btn btn-primary" style="padding: 0.75rem 2rem; text-decoration: none;">Back to Home</a>
                <a href="/admin/gym-classes" class="btn btn-secondary" style="padding: 0.75rem 2rem; text-decoration: none;">View Classes</a>
            </div>
        </div>
    </div>
</section>
@endsection