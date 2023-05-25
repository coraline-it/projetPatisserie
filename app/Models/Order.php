<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_number',
        'status',
        'payed_at',
        'user_id'
    ];

    public function products() {

        return $this->belongsToMany(Product::class)->using(OrderProduct::class)->withPivot('product_id','order_id','quantity','price');
    }
}
