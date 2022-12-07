<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
    
    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();
        static::deleted(function ($product) {
            $product->comments()->delete();
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
