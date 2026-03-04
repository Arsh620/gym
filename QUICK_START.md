# Quick Reference - Gym Management System

## 🚀 Setup Commands

```bash
# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate
php artisan db:seed --class=GymSeeder

# Start development
php artisan serve
npm run dev
```

## 📦 What Was Created

### 9 Models
- Member, Trainer, Plan, Membership, Payment
- GymClass, ClassBooking, Equipment, Attendance

### 9 Controllers  
- MemberController, TrainerController, PlanController
- MembershipController, PaymentController, GymClassController
- ClassBookingController, EquipmentController, AttendanceController

### 9 Migrations
- All database tables with proper relationships and constraints

### 1 Seeder
- GymSeeder with sample data (3 plans, 3 users, 3 equipment)

## 🔌 API Testing Examples

### Get all members
```bash
GET http://localhost:8000/members
```

### Create a new member
```bash
POST http://localhost:8000/members
{
  "user_id": 1,
  "phone": "1234567890",
  "date_of_birth": "1990-01-01",
  "gender": "male",
  "address": "123 Street",
  "emergency_contact": "John Doe",
  "emergency_phone": "0987654321"
}
```

### Get all plans
```bash
GET http://localhost:8000/plans
```

### Create membership
```bash
POST http://localhost:8000/memberships
{
  "member_id": 1,
  "plan_id": 1,
  "start_date": "2024-01-01",
  "end_date": "2024-02-01"
}
```

### Record attendance
```bash
POST http://localhost:8000/attendances
{
  "member_id": 1,
  "check_in": "2024-01-15 08:00:00"
}
```

### Update attendance (checkout)
```bash
PATCH http://localhost:8000/attendances/1
{
  "check_out": "2024-01-15 10:00:00"
}
```

## 📊 Database Relationships

```
User → Member → Memberships → Payments
User → Trainer → GymClasses → ClassBookings
Member → Attendances
Member → ClassBookings
Plan → Memberships
```

## 🎯 Key Features

✅ Complete CRUD operations for all entities
✅ Proper foreign key relationships
✅ Input validation on all endpoints
✅ Pagination support
✅ Status management
✅ Sample data seeding
✅ RESTful API design

## 📁 File Locations

- **Models**: `app/Models/`
- **Controllers**: `app/Http/Controllers/`
- **Migrations**: `database/migrations/`
- **Seeders**: `database/seeders/`
- **Routes**: `routes/web.php` & `routes/api.php`

## 🔐 Default Users

| Role    | Email              | Password |
|---------|-------------------|----------|
| Admin   | admin@gym.com     | password |
| Trainer | trainer@gym.com   | password |
| Member  | member@gym.com    | password |

## 💡 Tips

- Use Postman or Insomnia for API testing
- Check `PROJECT_OVERVIEW.md` for detailed structure
- All timestamps are automatically managed
- Status fields use enums for data integrity
- Foreign keys have cascade delete enabled
