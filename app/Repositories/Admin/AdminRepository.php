<?php

declare(strict_types=1);

namespace App\Repositories\Admin;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $percentage_between = $this->calculatePercentageScoreBetween2Dates($yesterday_total, $today_total);

        return [
            'total' => $today_total,
            'percentage_yesterday' => $percentage_between
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
        $percentage_between = $this->calculatePercentageScoreBetween2Dates($yesterday_total, $today_total);

        return [
            'total' => $today_total,
            'percentage_yesterday' => $percentage_between
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
        $percentage_between = $this->calculatePercentageScoreBetween2Dates($yesterday_total, $today_total);

        return [
            'total' => $today_total,
            'percentage_yesterday' => $percentage_between
        ];
    }

    public function getTodayOrders(): array
    {
        $today_total = $this->query(Order::class, 'payed_at', true)->count();
        $yesterday_total = $this->query(Order::class, 'payed_at', false)->count();
        $percentage_between = $this->calculatePercentageScoreBetween2Dates($yesterday_total, $today_total);
        return [
            'total' => $today_total,
            'percentage_yesterday' => $percentage_between
        ];
    }

    public function getLast30daysOrders()
    {
        return Order::whereBetween('payed_at', [Carbon::now()->subMonth(), Carbon::now()])->count();
    }

    public function getLast10Orders()
    {
        return Order::where('payed_at', '!=', null)->latest()->take(10)->get();
    }

    public function getOrdersLast30daysByDay()
    {
        return Order::select('*')->whereBetween('payed_at', [Carbon::now()->subMonth(), Carbon::now()])
            ->orderBy('payed_at', 'asc')
            ->get()
            ->groupBy(function($val) {
                return Carbon::parse($val->payed_at)->format('d-M');
            });
    }

    /**
     * Requête basique pour les données d'aujourd'hui
     *
     * @param string $model
     * @param string $column
     * @param bool $isToday
     * @return mixed
     */
    private function query(string $model, string $column, bool $isToday): mixed
    {
        $model = new $model;
        return $model::whereDate($column, $isToday ? Carbon::today() : Carbon::yesterday());
    }

    /**
     * Calcul le pourcentage d'une KPI entre la date d'aujourd'hui et celle d'hier
     *
     * @param $yesterday_total
     * @param $today_total
     * @return float
     */
    private function calculatePercentageScoreBetween2Dates($yesterday_total, $today_total): float
    {
        $diff_between = $yesterday_total - $today_total;
        $average_between = ($yesterday_total + $today_total)/2;
        return round(($diff_between / $average_between) * 100, 2);
    }
}
