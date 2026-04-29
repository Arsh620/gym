<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FitZone - Premium Fitness Experience')</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <meta name="description" content="Transform your body and mind at FitZone. Premium fitness facilities, expert trainers, and flexible membership plans.">
</head>
<body>
    <nav>
        <div class="container">
            <a href="/" class="logo">FitZone</a>
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="/plans">Membership</a>
                <a href="#classes">Classes</a>
                @auth
                    @if(auth()->user()->email === 'admin@fitzone.com')
                        <a href="/admin/dashboard">Admin</a>
                    @elseif(auth()->user()->member)
                        <a href="/member/dashboard">Dashboard</a>
                    @endif
                    <a href="/logout">Logout</a>
                @else
                    <a href="/login">Login</a>
                    <a href="/register">Join Now</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer style="background: #1a1a1a; padding: 3rem 0; margin-top: 5rem; border-top: 1px solid #333;">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
                <div>
                    <h3 style="color: #e74c3c; margin-bottom: 1rem;">FitZone</h3>
                    <p style="color: #888; line-height: 1.6;">Transform your body and mind with our premium fitness experience. Join thousands of members who have achieved their goals.</p>
                </div>
                <div>
                    <h4 style="color: #fff; margin-bottom: 1rem;">Quick Links</h4>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <a href="/plans" style="color: #888; text-decoration: none;">Membership Plans</a>
                        <a href="#classes" style="color: #888; text-decoration: none;">Group Classes</a>
                        <a href="/register" style="color: #888; text-decoration: none;">Join Now</a>
                    </div>
                </div>
                <div>
                    <h4 style="color: #fff; margin-bottom: 1rem;">Contact Info</h4>
                    <div style="color: #888; line-height: 1.8;">
                        <p>📍 123 Fitness Street, Gym City</p>
                        <p>📞 (555) 123-4567</p>
                        <p>✉️ info@fitzone.com</p>
                    </div>
                </div>
            </div>
            <div style="text-align: center; padding-top: 2rem; border-top: 1px solid #333; color: #666;">
                <p>&copy; 2024 FitZone. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
