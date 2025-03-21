<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_role',
        'username',
        'email',
        'password',
        'name',
        'nickname',
        'married_score_test',
        'marriage_motivation',
        'marriage_target_year',
        'emotional_readiness',
        'mbti_type',
        'relationship_personality',
        'love_language',
        'attachment_style',
        'hobbies_interests_id',
        'favorite_activities_id',
        'daily_habits_id',
        'religions_id',
        'drinking_habits',
        'smoking_habits',
        'friends',
        'followers',
        'gender',
        'education_level_id',
        'provinces_id',
        'cities_id',
        'profession',
        'job',
        'phone',
        'date_of_birth',
        'about',
        'save_post',
        'photo',
        'cover_photo',
        'status',
        'lastActive',
        'timezone',
        'email_verified_at',
        'remember_token',
        'payment_settings',
        'profile_status',
    ];


    
    protected $casts = [
        'married_score_test' => 'integer',
        'marriage_target_year' => 'integer',
        'emotional_readiness' => 'integer',
        'religions_id' => 'integer',
        'education_level_id' => 'integer',
        'provinces_id' => 'integer',
        'cities_id' => 'integer',
        'email_verified_at' => 'datetime',
        'lastActive' => 'datetime',
        'hobbies_interests_id' => 'array',
        'favorite_activities_id' => 'array',
        'daily_habits_id' => 'array',
        'friends' => 'array',
        'followers' => 'array',
        'save_post' => 'array',
        'payment_settings' => 'array',
    ];
}
