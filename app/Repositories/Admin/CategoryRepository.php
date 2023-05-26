<?php

declare(strict_types=1);

namespace App\Repositories\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    public function getAll(): Collection
    {
        return Category::all();
    }
}
