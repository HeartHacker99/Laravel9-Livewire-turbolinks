<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'description1', 'description2', 'slider_image', 'status'];
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
