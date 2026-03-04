<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Member;
use App\Models\Trainer;
use App\Models\Plan;
use App\Models\Equipment;
use App\Models\GymClass;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class GymSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data with foreign key constraints
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        GymClass::truncate();
        Trainer::truncate();
        Member::truncate();
        Equipment::truncate();
        Plan::truncate();
        User::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Create Plans
        $plans = [
            [
                'name' => 'Basic',
                'description' => 'Perfect for beginners starting their fitness journey',
                'duration_days' => 30,
                'price' => 29.99,
                'status' => 'active'
            ],
            [
                'name' => 'Premium',
                'description' => 'Most popular choice with personal training included',
                'duration_days' => 30,
                'price' => 59.99,
                'status' => 'active'
            ],
            [
                'name' => 'Elite',
                'description' => 'Ultimate fitness experience with all premium features',
                'duration_days' => 30,
                'price' => 99.99,
                'status' => 'active'
            ]
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }

        // Create Admin User
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@fitzone.com',
            'password' => Hash::make('password'),
        ]);

        // Create Trainers
        $trainers = [
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah@fitzone.com',
                'phone' => '555-0101',
                'specialization' => 'Strength Training & HIIT',
                'experience_years' => 8,
                'status' => 'active'
            ],
            [
                'name' => 'Mike Rodriguez',
                'email' => 'mike@fitzone.com',
                'phone' => '555-0102',
                'specialization' => 'Yoga & Flexibility',
                'experience_years' => 6,
                'status' => 'active'
            ],
            [
                'name' => 'Emma Chen',
                'email' => 'emma@fitzone.com',
                'phone' => '555-0103',
                'specialization' => 'Cardio & Weight Loss',
                'experience_years' => 5,
                'status' => 'active'
            ],
            [
                'name' => 'David Thompson',
                'email' => 'david@fitzone.com',
                'phone' => '555-0104',
                'specialization' => 'Bodybuilding & Nutrition',
                'experience_years' => 10,
                'status' => 'active'
            ]
        ];

        foreach ($trainers as $trainerData) {
            $trainerUser = User::create([
                'name' => $trainerData['name'],
                'email' => $trainerData['email'],
                'password' => Hash::make('password'),
            ]);

            Trainer::create([
                'user_id' => $trainerUser->id,
                'phone' => $trainerData['phone'],
                'specialization' => $trainerData['specialization'],
                'hire_date' => now(),
                'status' => $trainerData['status']
            ]);
        }

        // Create Member User
        $memberUser = User::create([
            'name' => 'Jane Member',
            'email' => 'member@fitzone.com',
            'password' => Hash::make('password'),
        ]);

        Member::create([
            'user_id' => $memberUser->id,
            'phone' => '0987654321',
            'date_of_birth' => '1990-01-01',
            'gender' => 'female',
            'address' => '123 Main St',
            'emergency_contact' => 'Emergency Contact',
            'emergency_phone' => '1111111111',
        ]);

        // Create Gym Classes
        $classes = [
            [
                'name' => 'Morning HIIT',
                'description' => 'High-intensity interval training to kickstart your day',
                'trainer_id' => 1,
                'schedule_day' => 'Monday',
                'start_time' => Carbon::tomorrow()->setTime(7, 0),
                'end_time' => Carbon::tomorrow()->setTime(7, 45),
                'capacity' => 20,
                'status' => 'active'
            ],
            [
                'name' => 'Yoga Flow',
                'description' => 'Relaxing yoga session for flexibility and mindfulness',
                'trainer_id' => 2,
                'schedule_day' => 'Tuesday',
                'start_time' => Carbon::tomorrow()->setTime(9, 30),
                'end_time' => Carbon::tomorrow()->setTime(10, 30),
                'capacity' => 15,
                'status' => 'active'
            ],
            [
                'name' => 'Cardio Blast',
                'description' => 'Fat-burning cardio workout for all fitness levels',
                'trainer_id' => 3,
                'schedule_day' => 'Wednesday',
                'start_time' => Carbon::tomorrow()->setTime(18, 0),
                'end_time' => Carbon::tomorrow()->setTime(18, 50),
                'capacity' => 25,
                'status' => 'active'
            ],
            [
                'name' => 'Strength Training',
                'description' => 'Build muscle and increase strength with proper form',
                'trainer_id' => 4,
                'schedule_day' => 'Thursday',
                'start_time' => Carbon::tomorrow()->addDay()->setTime(19, 0),
                'end_time' => Carbon::tomorrow()->addDay()->setTime(20, 0),
                'capacity' => 12,
                'status' => 'active'
            ],
            [
                'name' => 'Pilates Core',
                'description' => 'Core strengthening and stability workout',
                'trainer_id' => 2,
                'schedule_day' => 'Friday',
                'start_time' => Carbon::tomorrow()->addDays(2)->setTime(10, 0),
                'end_time' => Carbon::tomorrow()->addDays(2)->setTime(10, 45),
                'capacity' => 18,
                'status' => 'active'
            ],
            [
                'name' => 'Boxing Fitness',
                'description' => 'High-energy boxing workout for cardio and strength',
                'trainer_id' => 1,
                'schedule_day' => 'Saturday',
                'start_time' => Carbon::tomorrow()->addDays(3)->setTime(17, 30),
                'end_time' => Carbon::tomorrow()->addDays(3)->setTime(18, 25),
                'capacity' => 16,
                'status' => 'active'
            ]
        ];

        foreach ($classes as $class) {
            GymClass::create($class);
        }

        // Create Equipment
        $equipment = [
            ['name' => 'Treadmill Pro X1', 'category' => 'Cardio', 'purchase_date' => now()],
            ['name' => 'Olympic Bench Press', 'category' => 'Strength', 'purchase_date' => now()],
            ['name' => 'Adjustable Dumbbells Set', 'category' => 'Strength', 'purchase_date' => now()],
            ['name' => 'Rowing Machine Elite', 'category' => 'Cardio', 'purchase_date' => now()],
            ['name' => 'Cable Machine System', 'category' => 'Strength', 'purchase_date' => now()],
        ];

        foreach ($equipment as $item) {
            Equipment::create($item);
        }
    }
}
