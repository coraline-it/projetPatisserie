<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function orderProducts(): BelongsToMany
    {
        return $this->belongsToMany(OrderProduct::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
