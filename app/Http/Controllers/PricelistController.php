<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\VehicleModel;
use App\Models\Part;
use Illuminate\Http\Request;

class PricelistController extends Controller
{
    public function index()
    {
        $categories = Category::with(['vehicleModels.parts' => function($query) {
            $query->orderBy('price', 'asc');
        }])->get();
        
        return view('pricelist', compact('categories'));
    }
}
