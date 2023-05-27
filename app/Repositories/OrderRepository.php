<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    public function pagination($nb_per_page)
    {
        return Order::paginate($nb_per_page);
    }
    public function getAll(): Collection
    {
        return Order::all();
    }
}
