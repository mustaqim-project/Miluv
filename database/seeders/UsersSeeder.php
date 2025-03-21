<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];
        
        for ($i = 1; $i <= 100; $i++) {
            $users[] = [
                'user_role' => 'general',
                'username' => Str::random(6),
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make('password123'),
                'name' => 'User ' . $i,
                'nickname' => null,
                'married_score_test' => null,
                'marriage_motivation' => null,
                'marriage_target_year' => null,
                'emotional_readiness' => null,
                'mbti_type' => null,
                'relationship_personality' => null,
                'love_language' => null,
                'attachment_style' => null,
                'hobbies_interests_id' => null,
                'favorite_activities_id' => null,
                'daily_habits_id' => null,
                'religions_id' => null,
                'drinking_habits' => null,
                'smoking_habits' => null,
                'friends' => null,
                'followers' => null,
                'gender' => ($i % 2 == 0) ? 'Male' : 'Female',
                'education_level_id' => null,
                'provinces_id' => null,
                'cities_id' => null,
                'profession' => null,
                'job' => null,
                'phone' => null,
                'date_of_birth' => null,
                'about' => null,
                'save_post' => null,
                'photo' => null,
                'cover_photo' => null,
                'status' => '1',
                'lastActive' => now(),
                'timezone' => 'Asia/Jakarta',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'payment_settings' => null,
                'profile_status' => null
            ];
        }

        DB::table('users')->insert($users);
    }
}
