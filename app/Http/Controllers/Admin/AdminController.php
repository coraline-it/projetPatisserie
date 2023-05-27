<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\AdminRepository;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(AdminRepository $adminRepository): View
    {
        $today_money = $adminRepository->getTodayMoney();
        $today_users_connected = $adminRepository->getTodayUsersConnected();
        $today_new_users = $adminRepository->getTodayNewUsers();
        $today_orders = $adminRepository->getTodayOrders();
        return view('admin.admin_dashboard', compact('today_money', 'today_users_connected', 'today_new_users', 'today_orders'));
    }
}
