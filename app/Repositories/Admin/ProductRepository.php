<?php

declare(strict_types=1);

namespace App\Repositories\Admin;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    public function getAll(): Collection
    {
        return $this->query()->get();
    }

    public function paginate($nb_per_pages)
    {
        return $this->query()->paginate($nb_per_pages);
    }

    public function query()
    {
        return Product::with('category');
    }
}
