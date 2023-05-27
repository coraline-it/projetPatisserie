<?php

declare(strict_types=1);

namespace App\Repositories\Admin;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class AdminRepository
{
    /**
     * Prends le CA du jour + compare à celui d'hier résultats en %
     *
     * @return array
     */
    public function getTodayMoney(): array
    {
        $today_total = Order::whereDate('payed_at', Carbon::today())->sum('total');
        $yesterday_total = Order::whereDate('payed_at', Carbon::yesterday())->sum('total');
        $percentage_yesterday = round(($yesterday_total - $today_total) / $today_total * 100, 2);
        return [
            'total' => $today_total,
            'percentage_yesterday' => $percentage_yesterday
        ];
    }

    /**
     * Prends le CA du jour + compare à celui d'hier résultats en %
     *
     * @return array
     */
    public function getTodayUsersConnected(): array
    {
        $today_total = Order::whereDate('payed_at', Carbon::today())->sum('total');
        $yesterday_total = Order::whereDate('payed_at', Carbon::yesterday())->sum('total');
        $percentage_yesterday = round(($yesterday_total - $today_total) / $today_total * 100, 2);
        return [
            'total' => $today_total,
            'percentage_yesterday' => $percentage_yesterday
        ];
    }

    public function getAll(): Collection
    {
    }
}
