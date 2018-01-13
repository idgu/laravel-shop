<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\PhotosRequest;
use App\Photo;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProductsController extends Controller
{


    public function xhrGetSubcategories($id)
    {
        $subcategories = Subcategory::where('category_id','=', $id)->select('id', 'name')->get();
        header('Content-Type: application/json');
        echo json_encode($subcategories);
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id')->all();

        return view('admin.products.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotosRequest $request)
    {
        $input = $request->all();
        $time = time();


        if ($file = $request->file('photo_id')){

            $name = $time . $file->getClientOriginalName();

            $file->move('images/products/', $name);
            $photo = Photo::create(['file'=> $name]);
            $input['photo_id'] = $photo->id;
        }

        if ($file = $request->file('icon_id')){

            $name = 'icon_'. $time . $file->getClientOriginalName();

            $file->move('images/products/', $name);
            $photo = Photo::create(['file'=> $name]);
            $input['icon_id'] = $photo->id;
        }

        Product::create($input);

        return redirect()->route('admin.products.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all()->pluck('name', 'id')->all();

        return view('admin.products.edit', ['categories'=>$categories, 'product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhotosRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $input = $request->all();
        $time = time();

        //photo
        if ($file = $request->file('photo_id')) {

            $name = $time . $file->getClientOriginalName();
            $file->move('images/products/', $name);

            if ($photo = $product->photo) {
                $photo->deletePhotoFromDisc();
                $photo->file = $name;
                $photo->save();
                $input['photo_id'] = $photo->id;

            }

        }


    //icon
        if ($file = $request->file('icon_id')) {

            $name = 'icon_'. $time . $file->getClientOriginalName();
            $file->move('images/products/', $name);

            if ($icon= $product->icon) {
                unlink(public_path(). $icon->file);
                $icon->file = $name;
                $icon->save();
                $input['icon_id'] = $icon->id;

            }

        }


        $product->update($input);


        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $photo = $product->photo;
        $icon = $product->icon;


        $photo->deletePhotoFromDisc();
        unlink(public_path(). $icon->file);

        $photo->delete();
        $icon->delete();
        $product->delete();


        return redirect()->route('admin.products.index');
    }
}
