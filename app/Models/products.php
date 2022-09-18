<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id','product_name', 'product_price', 'product_category', 'product_image'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function order() {
        return $this->hasMany(Orders::class);
    }

    public function category() {
        return $this->belongsTo(category::class, 'category_id');
    }
}
