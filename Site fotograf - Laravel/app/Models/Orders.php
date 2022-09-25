<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','phone_number','first_name','last_name','email_address','address','total_price','payment_method','order_status'];
    public function products(){
        return $this->hasMany(order_products::class);
    }
}
