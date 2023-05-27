<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    private int $nb_paginate = 20;

    public function pagination()
    {
        return $this->query()->paginate($this->nb_paginate);
    }

    public function searchUsers($search)
    {
        return $this->query()->where(function ($query) use($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%');
        })->paginate($this->nb_paginate);
    }

    private function query()
    {
        return User::with('orders');
    }

}
