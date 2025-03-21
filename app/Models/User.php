<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Hobby;
use Cache;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'user_role', 'username', 'email', 'password', 'name',
        'nickname', 'married_score_test', 'marriage_motivation',
        'marriage_target_year', 'emotional_readiness', 'mbti_type',
        'relationship_personality', 'love_language', 'attachment_style',
        'drinking_habits', 'smoking_habits', 'friends', 'followers',
        'gender', 'education_level_id', 'provinces_id', 'cities_id',
        'profession', 'job', 'phone', 'date_of_birth', 'about',
        'save_post', 'photo', 'cover_photo', 'status', 'lastActive',
        'timezone', 'email_verified_at', 'remember_token',
        'payment_settings', 'profile_status'
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
        'friends' => 'array',
        'followers' => 'array',
        'save_post' => 'array',
        'payment_settings' => 'array',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];


    public function hobbies(): BelongsToMany
    {
        return $this->belongsToMany(Hobby::class, 'hobby_user', 'user_id', 'hobby_id');
    }


    public function isOnline(){
        return Cache::has('user-is-online-'.$this->id);
    }

    public static function get_user_image($file_name = "", $optimized = ""){
        $optimized = $optimized.'/';
        if(base_path('public/storage/userimage/'.$optimized.$file_name) && is_file('public/storage/userimage/'.$optimized.$file_name)){
            return asset('storage/userimage/'.$optimized.$file_name);
        }else{
            return asset('storage/userimage/default.png');
        }
    }
}
