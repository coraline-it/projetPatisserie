<?php

declare(strict_types=1);

namespace App\Repositories\Admin;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AdminRepository
{
    /**
     * Prends le CA du jour + compare à celui d'hier résultats en %
     *
     * @return array
     */
    public function getTodayMoney(): array
    {
        $today_total = $this->query(Order::class, 'payed_at', true)->sum('total');
        $yesterday_total = $this->query(Order::class, 'payed_at', false)->sum('total');
        $percentage_yesterday = round(($yesterday_total - $today_total) / $today_total * 100, 2);
        return [
            'total' => $today_total,
            'percentage_yesterday' => $percentage_yesterday
        ];
    }

    /**
     * Compte les utilisateurs connectés du jour et compare à ceux d'hier en %
     *
     * @return array
     */
    public function getTodayUsersConnected(): array
    {
        $today_total = $this->query(User::class, 'last_login_at', true)->count();
        $yesterday_total = $this->query(User::class, 'last_login_at', false)->count();
        $percentage_yesterday = round(($yesterday_total - $today_total) / $today_total * 100, 2);
        return [
            'total' => $today_total,
            'percentage_yesterday' => $percentage_yesterday
        ];
    }

    /**
     * Compte les nouveaux utilisateurs du jour et compare à ceux d'hier en %
     *
     * @return array
     */
    public function getTodayNewUsers(): array
    {
        $today_total = $this->query(User::class, 'created_at', true)->count();
        $yesterday_total = $this->query(User::class, 'created_at', false)->count();
        $percentage_yesterday = round(($yesterday_total - $today_total) / $today_total * 100, 2);
        return [
            'total' => $today_total,
            'percentage_yesterday' => $percentage_yesterday
        ];
    }

    public function getTodayOrders(): array
    {
        $today_total = $this->query(Order::class, 'payed_at', true)->count();
        $yesterday_total = $this->query(Order::class, 'payed_at', false)->count();
        $percentage_yesterday = round(($yesterday_total - $today_total) / $today_total * 100, 2);
        return [
            'total' => $today_total,
            'percentage_yesterday' => $percentage_yesterday
        ];
    }

    /**
     * Requête basique pour les données d'aujourd'hui
     *
     * @param $model
     * @return mixed
     */
    private function query(string $model, string $column, bool $isToday)
    {
        $model = new $model;
        return $model::whereDate($column, $isToday ? Carbon::today() : Carbon::yesterday());
    }
}
