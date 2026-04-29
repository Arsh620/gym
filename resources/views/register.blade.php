@extends('layouts.app')

@section('title', 'Join FitZone - Start Your Fitness Journey')

@section('content')
<section style="padding: 3rem 0; min-height: 80vh;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: stretch; min-height: 600px;">
            <!-- Form Side -->
            <div style="background: #1a1a1a; border-radius: 16px; overflow: hidden; border: 1px solid #333; display: flex; flex-direction: column;">
                <!-- Header -->
                <div style="background: linear-gradient(135deg, #e74c3c, #c0392b); padding: 2rem; text-align: center;">
                    <h1 style="color: white; font-size: 2.2rem; font-weight: 700; margin: 0 0 0.5rem 0;">Join FitZone</h1>
                    <p style="color: rgba(255,255,255,0.95); font-size: 1.1rem; margin: 0;">{{ $plan->name }} Plan - ${{ $plan->price }}/month</p>
                </div>

                <!-- Form -->
                <div style="padding: 2rem; flex: 1; display: flex; flex-direction: column;">
                    <form action="/register" method="POST" style="flex: 1; display: flex; flex-direction: column;">
                        @csrf
                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                        
                        <!-- Personal Info -->
                        <div style="margin-bottom: 1.5rem;">
                            <h3 style="color: #e74c3c; font-size: 1.1rem; margin-bottom: 1rem; padding-bottom: 0.5rem; border-bottom: 1px solid #333;">Personal Information</h3>
                            
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                                <div>
                                    <label style="display: block; color: #fff; font-weight: 500; margin-bottom: 0.5rem; font-size: 0.9rem;">Full Name *</label>
                                    <input type="text" name="name" required placeholder="Enter your full name" style="width: 100%; padding: 0.75rem; background: #2a2a2a; border: 1px solid #444; border-radius: 6px; color: #fff; font-size: 0.9rem;">
                                </div>
                                <div>
                                    <label style="display: block; color: #fff; font-weight: 500; margin-bottom: 0.5rem; font-size: 0.9rem;">Email *</label>
                                    <input type="email" name="email" required placeholder="your@email.com" style="width: 100%; padding: 0.75rem; background: #2a2a2a; border: 1px solid #444; border-radius: 6px; color: #fff; font-size: 0.9rem;">
                                </div>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                                <div>
                                    <label style="display: block; color: #fff; font-weight: 500; margin-bottom: 0.5rem; font-size: 0.9rem;">Phone *</label>
                                    <input type="tel" name="phone" required placeholder="(555) 123-4567" style="width: 100%; padding: 0.75rem; background: #2a2a2a; border: 1px solid #444; border-radius: 6px; color: #fff; font-size: 0.9rem;">
                                </div>
                                <div>
                                    <label style="display: block; color: #fff; font-weight: 500; margin-bottom: 0.5rem; font-size: 0.9rem;">Date of Birth *</label>
                                    <input type="date" name="date_of_birth" required style="width: 100%; padding: 0.75rem; background: #2a2a2a; border: 1px solid #444; border-radius: 6px; color: #fff; font-size: 0.9rem;">
                                </div>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                                <div>
                                    <label style="display: block; color: #fff; font-weight: 500; margin-bottom: 0.5rem; font-size: 0.9rem;">Gender *</label>
                                    <select name="gender" required style="width: 100%; padding: 0.75rem; background: #2a2a2a; border: 1px solid #444; border-radius: 6px; color: #fff; font-size: 0.9rem;">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div>
                                    <label style="display: block; color: #fff; font-weight: 500; margin-bottom: 0.5rem; font-size: 0.9rem;">Password *</label>
                                    <input type="password" name="password" required placeholder="Minimum 6 characters" style="width: 100%; padding: 0.75rem; background: #2a2a2a; border: 1px solid #444; border-radius: 6px; color: #fff; font-size: 0.9rem;">
                                </div>
                            </div>

                            <div>
                                <label style="display: block; color: #fff; font-weight: 500; margin-bottom: 0.5rem; font-size: 0.9rem;">Address</label>
                                <input type="text" name="address" placeholder="Your address (optional)" style="width: 100%; padding: 0.75rem; background: #2a2a2a; border: 1px solid #444; border-radius: 6px; color: #fff; font-size: 0.9rem;">
                            </div>
                        </div>

                        <!-- Emergency Contact -->
                        <div style="margin-bottom: 1.5rem;">
                            <h3 style="color: #e74c3c; font-size: 1.1rem; margin-bottom: 1rem; padding-bottom: 0.5rem; border-bottom: 1px solid #333;">Emergency Contact</h3>
                            
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                <div>
                                    <label style="display: block; color: #fff; font-weight: 500; margin-bottom: 0.5rem; font-size: 0.9rem;">Contact Name *</label>
                                    <input type="text" name="emergency_contact" required placeholder="Full name" style="width: 100%; padding: 0.75rem; background: #2a2a2a; border: 1px solid #444; border-radius: 6px; color: #fff; font-size: 0.9rem;">
                                </div>
                                <div>
                                    <label style="display: block; color: #fff; font-weight: 500; margin-bottom: 0.5rem; font-size: 0.9rem;">Contact Phone *</label>
                                    <input type="tel" name="emergency_phone" required placeholder="Phone number" style="width: 100%; padding: 0.75rem; background: #2a2a2a; border: 1px solid #444; border-radius: 6px; color: #fff; font-size: 0.9rem;">
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div style="margin-top: auto;">
                            <button type="submit" style="width: 100%; padding: 1rem 2rem; background: linear-gradient(135deg, #e74c3c, #c0392b); color: white; border: none; border-radius: 8px; font-size: 1.1rem; font-weight: 600; cursor: pointer; transition: transform 0.2s, box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(231, 76, 60, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">Complete Registration</button>
                        </div>
                    </form>

                    <div style="text-align: center; margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #333; color: #888; font-size: 0.9rem;">
                        Already have an account? <a href="/login" style="color: #e74c3c; text-decoration: none; font-weight: 600;">Sign in here</a>
                    </div>
                </div>
            </div>

            <!-- Image Side -->
            <div style="position: relative; min-height: 600px;">
                <img src="/images/samuel-girven-VJ2s0c20qCo-unsplash.jpg" alt="Fitness Training" style="width: 100%; height: 100%; object-fit: cover; border-radius: 16px; box-shadow: 0 20px 40px rgba(231, 76, 60, 0.2);">
                <div style="position: absolute; top: 2rem; left: 2rem; background: rgba(0,0,0,0.8); padding: 1.5rem; border-radius: 12px; backdrop-filter: blur(10px);">
                    <h3 style="color: #e74c3c; font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem;">Transform Today</h3>
                    <p style="color: #fff; margin: 0; font-size: 1rem;">Join 500+ members achieving their goals</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@media (max-width: 1024px) {
    section > div > div {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
    }
    
    section > div > div > div:first-child img {
        height: 400px !important;
    }
}

@media (max-width: 768px) {
    section > div > div > div:nth-child(2) > div:nth-child(2) form > div > div {
        grid-template-columns: 1fr !important;
        gap: 1rem !important;
    }
}

input:focus, select:focus {
    outline: none !important;
    border-color: #e74c3c !important;
    box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1) !important;
}
</style>
@endsection