<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;


// creating a custom pivot model for the ManyToMany relashionship
class OrderProduct extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'product_id','order_id','quantity','price'
    ];


    public function orders()
    {
        return $this->belongsTo(Order::class , 'order_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }
}






