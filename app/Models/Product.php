<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'category_id',
        'img',
        'price'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

        // Create ManyToMany relashionship with customers table
        public function orders() {

            return $this->belongsToMany(Order::class)->using(OrderProduct::class)->withPivot('product_id','order_id','quantity','price');
        }
}
