<?php




Auth::routes();

Route::get('/', 'HomeController@index')->name('mainpage');
Route::get('/faq', 'HomeController@faq')->name('faq');



Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function() {



    Route::get('/', 'Admin\AdminDashboardController@index')->name('admin.index');

    Route::get('/orders', 'Admin\AdminOrdersController@index')->name('admin.orders.index');



    Route::resource('users', 'Admin\AdminUsersController', [
        'names' => [
            'index' => 'admin.users.index',
            'store' => 'admin.users.store',
            'create' => 'admin.users.create',
            'destroy' => 'admin.users.destroy',
            'update' => 'admin.users.update',
            'show' => 'admin.users.show',
            'edit' => 'admin.users.edit',
        ]
    ]);


    Route::resource('products', 'Admin\AdminProductsController', [
        'names' => [
            'index' => 'admin.products.index',
            'store' => 'admin.products.store',
            'create' => 'admin.products.create',
            'destroy' => 'admin.products.destroy',
            'update' => 'admin.products.update',
            'show' => 'admin.products.show',
            'edit' => 'admin.products.edit',
        ]
    ]);

    Route::resource('categories', 'Admin\AdminCategoriesController', [
        'names' => [
            'index' => 'admin.categories.index',
            'store' => 'admin.categories.store',
            'create' => 'admin.categories.create',
            'destroy' => 'admin.categories.destroy',
            'update' => 'admin.categories.update',
            'show' => 'admin.categories.show',
            'edit' => 'admin.categories.edit',
        ]
    ]);

    Route::resource('subcategories', 'Admin\AdminSubcategoriesController', [
        'names' => [
            'index' => 'admin.subcategories.index',
            'store' => 'admin.subcategories.store',
            'create' => 'admin.subcategories.create',
            'destroy' => 'admin.subcategories.destroy',
            'update' => 'admin.subcategories.update',
            'show' => 'admin.subcategories.show',
            'edit' => 'admin.subcategories.edit',
        ]
    ]);


    Route::resource('faqs', 'Admin\AdminFaqsController', [
        'names' => [
            'index' => 'admin.faqs.index',
            'store' => 'admin.faqs.store',
            'create' => 'admin.faqs.create',
            'destroy' => 'admin.faqs.destroy',
            'update' => 'admin.faqs.update',
            'show' => 'admin.faqs.show',
            'edit' => 'admin.faqs.edit',
        ]
    ]);

    Route::get('/products/xhrGetSubcategories/{id}', 'Admin\AdminProductsController@xhrGetSubcategories')->name('getSubcategories');


});



Route::prefix('/products')->group(function() {

    Route::get('/details/{id}', 'ProductsController@details')->name('products.details');
    Route::get('/search', 'ProductsController@search')->name('products.search');
    Route::get('/subcategory/{subcategory}', 'ProductsController@productsBySubcategory')->name('products.productsBySubcategory');
    Route::get('/addProductsToCart/{id}/{qty}', 'ProductsController@addProductsToCart')->name('products.addProductsToCart');
    Route::get('/xhrAddProductsToCart/{id}/{qty}', 'ProductsController@xhrAddProductsToCart')->name('products.xhrAddProductsToCart');
    Route::get('/deleteProductsFromCart/{id}/{qty}', 'ProductsController@deleteProductsFromCart')->name('products.deleteProductsFromCart');
    Route::get('/xhrDeleteProductsFromCart/{id}/{qty}', 'ProductsController@xhrDeleteProductsFromCart')->name('products.xhrDeleteProductsFromCart');

});


Route::prefix('/orders')->group(function() {
    Route::get('/show', 'OrdersController@show')->name('orders.show');
    Route::get('/summary', 'OrdersController@summary')->name('orders.summary')->middleware('auth');
    Route::get('/buy', 'OrdersController@buy')->name('orders.buy')->middleware('auth');
    Route::post('/catchresponsepayu', 'OrdersController@catchResponsePayu')->name('orders.catchresponsepayu');
    Route::get('/test', 'OrdersController@test')->name('orders.test');

});

