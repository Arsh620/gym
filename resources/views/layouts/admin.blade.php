<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Gym Management')</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav>
        <div class="container">
            <a href="/admin/dashboard" class="logo">GYM ADMIN</a>
            <div class="nav-links">
                <a href="/admin/dashboard">Dashboard</a>
                <a href="/admin/members">Members</a>
                <a href="/admin/trainers">Trainers</a>
                <a href="/admin/gym-classes">Classes</a>
                <a href="/admin/plans">Plans</a>
                <a href="/admin/equipment">Equipment</a>
                <a href="/admin/payments">Payments</a>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>
</body>
</html>
