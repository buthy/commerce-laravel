<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'StoreController@index');
Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);
Route::get('cart', ['as' => 'cart', 'uses' => 'CartController@index']);
Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
Route::get('cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::pattern('id','[0-9]+');

Route::group(['prefix' => 'admin'], function() {

    Route::get('/', 'ProductsController@index');

    Route::group(['prefix' => 'categories'], function() {
        Route::get('', ['as'=>'admin.categories.index', 'uses'=>'CategoriesController@index']);
        Route::post('', ['as'=>'admin.categories.store', 'uses'=>'CategoriesController@store']);
        Route::get('create', ['as'=>'admin.categories.create', 'uses'=>'CategoriesController@create']);
        Route::get('{id}/edit', ['as'=>'admin.categories.edit', 'uses'=>'CategoriesController@edit']);
        Route::put('{id}/update', ['as'=>'admin.categories.update', 'uses'=>'CategoriesController@update']);
        Route::get('{id}/destroy', ['as'=>'admin.categories.destroy', 'uses'=>'CategoriesController@destroy']);
    });

    Route::group(['prefix' => 'products'], function() {
        Route::get('', ['as'=>'admin.products.index', 'uses'=>'ProductsController@index']);
        Route::post('', ['as'=>'admin.products.store', 'uses'=>'ProductsController@store']);
        Route::get('create', ['as'=>'admin.products.create', 'uses'=>'ProductsController@create']);
        Route::get('{id}/edit', ['as'=>'admin.products.edit', 'uses'=>'ProductsController@edit']);
        Route::put('{id}/update', ['as'=>'admin.products.update', 'uses'=>'ProductsController@update']);
        Route::get('{id}/destroy', ['as'=>'admin.products.destroy', 'uses'=>'ProductsController@destroy']);

        Route::group(['prefix' => 'images'], function() {
            Route::get('{id}/images', ['as'=>'admin.products.images', 'uses'=>'ProductsController@images']);
            Route::get('{id}/images/create', ['as'=>'admin.products.images.create', 'uses'=>'ProductsController@createImage']);
            Route::post('{id}/images/store', ['as'=>'admin.products.images.store', 'uses'=>'ProductsController@storeImage']);
            Route::get('{id}/images/destroy', ['as'=>'admin.products.images.destroy', 'uses'=>'ProductsController@destroyImage']);
        });

    });

});

// ? significa que pode ou nao ter um id
// $id = null significa que o valor padrao caso nao exista id sera null
// no where significa que o id devera conter numeros de 0-9, ao colocar [A-Za-z] somente letras
// o + significa pelo menos um caractere
/*
Route::get('user/{id?}', function($id = null) {
    if ($id)
        return "Olá ".$id;

    return "Não possui ID";
})->where('id', '[0-9]+');
*/

// caso queira cadastrar um padrao, sempre que existir um campo id ser numerico
// Route::pattern('id', '[0-9]+');

// passa o objeto na url
// para funcionar precisa cadastrar o objeto category na RouteServiceProvider
/*
Route::get('category/{category}', function(\CodeCommerce\Category $category) {
    return $category->name;
});
*/

/*
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    Route::group(['prefix' => 'posts'], function() {

        Route::get('', ['as'=>'admin/posts/index', 'uses'=>'PostsAdminController@index']);
        Route::get('create', ['as'=>'admin/posts/create', 'uses'=>'PostsAdminController@create']);
        Route::post('store', ['as'=>'admin/posts/store', 'uses'=>'PostsAdminController@store']);
        Route::get('edit', ['as'=>'admin/posts/edit', 'uses'=>'PostsAdminController@index']);
        Route::get('edit/{id}', ['as'=>'admin/posts/edit', 'uses'=>'PostsAdminController@edit']);
        Route::put('update/{id}', ['as'=>'admin/posts/update', 'uses'=>'PostsAdminController@update']);
        Route::get('destroy/{id}', ['as'=>'admin/posts/destroy', 'uses'=>'PostsAdminController@destroy']);

    });

});
*/
