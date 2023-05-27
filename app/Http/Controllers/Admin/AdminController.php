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
        return view('admin.admin_dashboard', compact('today_money'));
    }
}
