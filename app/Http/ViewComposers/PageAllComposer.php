<?php

namespace App\Http\ViewComposers;

use App\Category;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;


class PageAllComposer
{



    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $categories = Category::all();
        $categoriesPluck = $categories->pluck('name', 'id')->all();


        $view->with('categories', $categories)->with('categoriesPluck', $categoriesPluck)->with('auth', Auth::user());

        if (Session::has('cart')) {
            $view->with('cart', Session::get('cart'));
        } else {
            $view->with('cart', null);
        }


        $twoproducts = Product::inRandomOrder()->take(2)->get();


        $view->with('twoproducts', $twoproducts);

    }
}