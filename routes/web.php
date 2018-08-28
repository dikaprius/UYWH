<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
// Route::get('/', function () {
//     return view('welcome');
// });

//middleware for makesure that user must be validated to go to CMS

Route::middleware(['auth'])->group(function () {
    //CMS route like : Create, Read, Update and Delete --> Resource
    Route::resource('/file', 'FileController')->middleware('admin');
    Route::get('/archive', 'FileController@archive');
    Route::post('/archive', 'FileController@restore')->name('archive');
    Route::delete('/archive/delete', 'FileController@forceDelete')->name('forceDelete');
});



Auth::routes();
// Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
// Route::post('/register', 'Auth\RegisterController@create');
Route::get('/redirect', 'FacebookController@redirect');
Route::get('/callback', 'FacebookController@callback');
Route::get('/linkedin-redirect', 'FacebookController@linkedinRedirect');
Route::get('/linkedin-callback', 'FacebookController@linkedinCallback');

Route::get('/', 'UywhController@index');
Route::get('/home', 'UywhController@index');
Route::get('/search', 'UywhController@searchData');
// Route::get('/category/{idn}', 'UywhController@filterIndonesia')->name('category.filter.indonesia');
// Route::get('/category/{thai}', 'UywhController@filterThailand')->name('category.filter.thailand');
// Route::get('/category/{sng}', 'UywhController@filterSingapura')->name('category.filter.singapura');
// Route::get('/category/{cna}', 'UywhController@filterChina')->name('category.filter.china');
Route::get('/category/{nama_barang}', 'UywhController@filter')->name('category.filter');

//Routing Error Page
Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);
Route::get('405',['as'=>'405','uses'=>'ErrorHandlerController@errorCode405']);

//Routing Show Catalog
Route::get('/catalog',['as'=> 'Category.catalog.get', 'uses' =>'UywhController@show']);
Route::get('/catalog/checkout/{id}',['as'=> 'catalog.checkout.get', 'uses' =>'UywhController@checkout']);
Route::post('/catalog/checkout/{id}',['as'=> 'catalog.checkout.post', 'uses' =>'UywhController@checkout']);

Route::post('/catalog/cart',['as'=> 'catalog.shopcart.post', 'uses'=> 'CartController@buy']);
Route::get('/catalog/cart', ['as'=> 'catalog.shopcart.get', 'uses'=> 'CartController@buyPage']);
// Route::post('/catalog/shopcart',['as'=>'post.barang', 'uses' =>'CartController@shopCart']);
Route::post('/catalog/cart-delete', 'CartController@delete');
Route::get('/catalog/wishlist', ['as'=> 'catalog.wishlist.get', 'uses'=> 'CartController@wishlistPage']);
Route::post('/catalog/wishlist', ['as'=> 'catalog.wishlist.post', 'uses'=> 'CartController@wishlist']);
Route::post('/catalog/wish-delete', 'CartController@wishlistDelete')->name('wish-delete');
