<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';


    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'thumbnail',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'scheduled_at',
        'banner',
        'status',
        'tag',
        'view',
       
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
}
