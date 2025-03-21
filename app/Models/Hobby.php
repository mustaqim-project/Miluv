<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(Users::class, 'hobby_user', 'hobby_id', 'user_id');
    }
}