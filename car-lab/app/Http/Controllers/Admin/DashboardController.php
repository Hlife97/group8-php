<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $carsCount = Car::count();
        $usersCount = User::count();
        return view('admin.dashboard', compact('carsCount', 'usersCount'));
    }
}
