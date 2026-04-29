<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Gym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white text-center">
                        <h2>🎉 Welcome to Our Gym!</h2>
                    </div>
                    <div class="card-body text-center">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        
                        <h4>Hello, {{ $user->name }}!</h4>
                        <p class="lead">Thank you for joining our gym family.</p>
                        
                        @if($membership)
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h5>Your Membership</h5>
                                            <p><strong>Plan:</strong> {{ $membership->plan->name }}</p>
                                            <p><strong>Start Date:</strong> {{ $membership->start_date->format('d M Y') }}</p>
                                            <p><strong>End Date:</strong> {{ $membership->end_date->format('d M Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h5>Next Steps</h5>
                                            <ul class="list-unstyled">
                                                <li>✓ Visit the gym</li>
                                                <li>✓ Meet your trainer</li>
                                                <li>✓ Start your fitness journey</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        <div class="mt-4">
                            <a href="/member/dashboard" class="btn btn-primary btn-lg me-3">Go to Dashboard</a>
                            <a href="/logout" class="btn btn-outline-secondary">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>