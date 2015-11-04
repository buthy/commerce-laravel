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

Route::get('/', function () {
    return view('welcome');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::pattern('id','[0-9]+');

Route::get('categories', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
Route::post('categories/store', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
Route::get('categories/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
Route::get('categories/{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
Route::get('categories/{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
Route::put('categories/{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);

Route::get('products', ['as' => 'products', 'uses' => 'ProductsController@index']);
Route::post('products/store', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
Route::get('products/create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
Route::get('products/{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
Route::get('products/{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
Route::put('products/{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

/*
Route::group(['prefix' => 'admin'], function() {

    Route::group(['prefix' => 'categories'], function() {
        Route::get('', ['as'=>'admin/categories/list', 'uses'=>'AdminCategoriesController@index']);
        Route::get('create', ['as'=>'admin/categories/create', 'uses'=>'AdminCategoriesController@index']);
        Route::post('save', ['as'=>'admin/categories/save', 'uses'=>'AdminCategoriesController@save']);
        Route::get('edit/{id}', ['as'=>'admin/categories/edit', 'uses'=>'AdminCategoriesController@index']);
        Route::put('update/{id}', ['as'=>'admin/categories/update', 'uses'=>'AdminCategoriesController@index']);
        Route::get('delete/{id}', ['as'=>'admin/categories/delete', 'uses'=>'AdminCategoriesController@index']);
    });

    Route::group(['prefix' => 'products'], function() {
        Route::get('', ['as'=>'admin/products/list', 'uses'=>'AdminProductsController@index']);
        Route::get('create', ['as'=>'admin/products/create', 'uses'=>'AdminProductsController@index']);
        Route::post('save', ['as'=>'admin/products/save', 'uses'=>'AdminProductsController@save']);
        Route::get('edit/{id}', ['as'=>'admin/products/edit', 'uses'=>'AdminProductsController@index']);
        Route::put('update/{id}', ['as'=>'admin/products/update', 'uses'=>'AdminProductsController@index']);
        Route::get('delete/{id}', ['as'=>'admin/products/delete', 'uses'=>'AdminProductsController@index']);
    });

});
*/

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
