# Gym Management System - Project Structure

## Database Schema

### Core Tables

1. **users** - Authentication & user accounts
2. **members** - Gym member profiles
3. **trainers** - Gym trainer profiles
4. **plans** - Membership plans (Basic, Premium, VIP)
5. **memberships** - Active member subscriptions
6. **payments** - Payment transactions
7. **gym_classes** - Scheduled fitness classes
8. **class_bookings** - Class reservations
9. **equipment** - Gym equipment inventory
10. **attendances** - Member check-in/out records

## Models & Relationships

### User
- hasOne: Member, Trainer

### Member
- belongsTo: User
- hasMany: Memberships, Payments, Attendances

### Trainer
- belongsTo: User
- hasMany: GymClasses

### Plan
- hasMany: Memberships

### Membership
- belongsTo: Member, Plan

### Payment
- belongsTo: Member, Membership

### GymClass
- belongsTo: Trainer
- hasMany: ClassBookings

### ClassBooking
- belongsTo: GymClass, Member

### Attendance
- belongsTo: Member

## API Endpoints

All endpoints are RESTful resources:

- `/members` - Member management
- `/memberships` - Membership subscriptions
- `/plans` - Membership plans
- `/trainers` - Trainer management
- `/gym-classes` - Class schedules
- `/class-bookings` - Class reservations
- `/payments` - Payment processing
- `/equipment` - Equipment tracking
- `/attendances` - Check-in/out system

## Setup Instructions

1. Run migrations:
```bash
php artisan migrate
```

2. Seed initial data:
```bash
php artisan db:seed --class=GymSeeder
```

3. Start development server:
```bash
php artisan serve
```

## Default Credentials

- Admin: admin@gym.com / password
- Trainer: trainer@gym.com / password
- Member: member@gym.com / password

## Next Steps

1. Implement authentication (Laravel Breeze/Sanctum)
2. Add role-based access control
3. Create frontend views
4. Add validation rules
5. Implement business logic
6. Add reporting features
