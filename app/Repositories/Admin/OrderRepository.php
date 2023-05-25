<?php

declare(strict_types=1);

namespace App\Repositories\Admin;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    public function getAll(): Collection
    {
        return Order::all();
    }
}
