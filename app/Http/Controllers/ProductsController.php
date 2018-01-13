<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function details($id)
    {
        $product = Product::findOrFail($id);
        return view('products.details', ['product'=>$product]);
    }


    public function productsBySubcategory($subcategory)
    {
        $subcategory = Subcategory::findOrFail($subcategory);
        $products = $subcategory->products()->paginate(2);;
        $category_name = $subcategory->category->name;
        return view('products.productBySubcategory', ['products'=>$products, 'category_name'=>$category_name, 'subcategory_name'=>$subcategory->name]);

    }





    public function addProductsToCart($id, $qty = 1) {
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);

        $cart->add($product, $id, $qty);

        Session::put('cart', $cart);

        return redirect()->route('orders.show');
    }


    public function deleteProductsFromCart($id, $qty = 1)
    {
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->delete($product->id, $qty);
        Session::put('cart', $cart);
        return redirect()->route('orders.show');
    }





    public function xhrDeleteProductsFromCart($id, $qty = 1)
    {
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->delete($product->id, $qty);
        Session::put('cart', $cart);

        header('Content-Type: application/json');
        echo json_encode($cart);
    }


    public function xhrAddProductsToCart($id, $qty = 1)
    {
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);

        $cart->add($product, $id, $qty);

        Session::put('cart', $cart);


        header('Content-Type: application/json');
        echo json_encode($cart);
    }



    public function search(Request $request) {

        $category_id = ($request->category_id) ? $request->category_id : 0;
        if ($category_id) {

            $products = Product::where('category_id','=', $category_id)
                ->where(function ($query) use ($request) {
                    $query->where('brand', 'like', '%' . $request->search . '%')
                        ->orWhere('model', 'like', '%' . $request->search . '%');

                })
                ->paginate(3);


        } else {
            $products = Product::where('brand', 'like', '%' . $request->search . '%')
                ->orWhere('model', 'like', '%' . $request->search . '%')->paginate(3);
        }

        $products->withPath('?category_id='. $category_id . '&search='.$request->search);

        return view('products.search', ['products'=>$products]);

    }

}
