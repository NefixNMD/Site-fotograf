<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_products extends Model
{
    use HasFactory;
    public $fillable = ['products_id', 'orders_id'];
    public function products(){
        return $this->hasMany(Products::class);
    }
}
