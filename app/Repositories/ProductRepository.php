<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository
{
    public function pagination($nbPerPage): LengthAwarePaginator
    {
        return $this->query()->paginate($nbPerPage);
    }

    private function query(): Builder
    {
        return Product::with('category');
    }
}
