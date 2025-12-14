<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Category;
use App\Models\VehicleModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalServices = Service::count();
        $totalCategories = Category::count();
        $totalModels = VehicleModel::count();
        
        return view('admin.dashboard', compact('totalServices', 'totalCategories', 'totalModels'));
    }
}

