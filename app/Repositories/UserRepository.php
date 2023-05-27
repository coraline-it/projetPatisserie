<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function pagination($nbPerPage)
    {
        return $this->query()->paginate($nbPerPage);
    }

    private function query()
    {
        return User::with('orders');
    }

}
