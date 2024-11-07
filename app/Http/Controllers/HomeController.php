<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WatchController;

class HomeController extends Controller
{
    //
    public function show() {
        $watches = WatchController::index();
        $brand = BrandController::index();
        $category = CategoryController::index();
        return view('home', ['watches' => $watches,'brand' => $brand, 'category' => $category]);
    }
}
