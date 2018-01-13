<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{

    public function index()
    {
        $orders_count = Order::all()->count();
        $users_count = User::all()->count();
        $products_count = Product::all()->count();
        $categories_count = Category::all()->count();
        return view('admin.index', ['products_count'=>$products_count, 'categories_count'=>$categories_count, 'users_count'=>$users_count, 'orders_count'=> $orders_count]);
    }
}
