@extends('layouts.app')

@section('title', 'Login - FitZone')

@section('content')
<section style="padding: 5rem 0; min-height: 80vh; display: flex; align-items: center;">
    <div style="max-width: 400px; margin: 0 auto; padding: 0 1rem; width: 100%;">
        <div style="background: #1a1a1a; border-radius: 16px; overflow: hidden; border: 1px solid #333;">
            <!-- Header -->
            <div style="background: linear-gradient(135deg, #e74c3c, #c0392b); padding: 2rem; text-align: center;">
                <h1 style="color: white; font-size: 2rem; font-weight: 700; margin: 0 0 0.5rem 0;">Welcome Back</h1>
                <p style="color: rgba(255,255,255,0.95); font-size: 1rem; margin: 0;">Sign in to your FitZone account</p>
            </div>

            <!-- Form -->
            <div style="padding: 2rem;">
                <form action="/login" method="POST">
                    @csrf
                    
                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; color: #fff; font-weight: 500; margin-bottom: 0.5rem;">Email Address</label>
                        <input type="email" name="email" required placeholder="your@email.com" style="width: 100%; padding: 0.75rem; background: #2a2a2a; border: 1px solid #444; border-radius: 6px; color: #fff; font-size: 1rem;">
                        @error('email')
                            <span style="color: #e74c3c; font-size: 0.9rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 2rem;">
                        <label style="display: block; color: #fff; font-weight: 500; margin-bottom: 0.5rem;">Password</label>
                        <input type="password" name="password" required placeholder="Enter your password" style="width: 100%; padding: 0.75rem; background: #2a2a2a; border: 1px solid #444; border-radius: 6px; color: #fff; font-size: 1rem;">
                    </div>

                    <button type="submit" style="width: 100%; padding: 1rem 2rem; background: linear-gradient(135deg, #e74c3c, #c0392b); color: white; border: none; border-radius: 8px; font-size: 1.1rem; font-weight: 600; cursor: pointer; transition: transform 0.2s, box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(231, 76, 60, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">Sign In</button>
                </form>

                <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #333; color: #888;">
                    Don't have an account? <a href="/register" style="color: #e74c3c; text-decoration: none; font-weight: 600;">Join FitZone</a>
                </div>

                <!-- Demo Credentials -->
                <div style="background: #2a2a2a; border-radius: 8px; padding: 1rem; margin-top: 1.5rem; font-size: 0.9rem;">
                    <h4 style="color: #e74c3c; margin-bottom: 0.5rem;">Demo Accounts:</h4>
                    <div style="color: #ccc;">
                        <strong>Admin:</strong> admin@fitzone.com / password<br>
                        <strong>Member:</strong> member@fitzone.com / password
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection