<?php

namespace App\Http\Controllers;

use App\Category;
use App\Faq;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $random_products[] = Product::inRandomOrder()->take(4)->get();
        $random_products[] = Product::inRandomOrder()->take(4)->get();
        $products = Product::orderBy('created_at', 'desc')->take(3)->get();
        return view('index', ['products'=>$products, 'random_products'=>$random_products]);
    }

    public function faq()
    {
        $faq = Faq::all();
        return view('faq', ['faq'=>$faq]);
    }
}
