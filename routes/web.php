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

Route::get('/', function () {
    return view('public/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/{anypath}','HomeController@index')->where('path','.*');
Route::group(['middleware' => ['auth']], function () {
    Route::post('/add-category','categoryController@add_category');
    Route::get('category','categoryController@all_category');
    Route::get('category/{id}','categoryController@delete_category');
    Route::get('editcategory/{id}','categoryController@edit_category');
    Route::post('update-category/{id}','categoryController@update_category');
    
    Route::get('post','PostController@all_post');
    Route::post('/savepost','PostController@save_post');
    Route::get('/deletepost/{id}','PostController@delete_post');
    Route::get('/post/{id}','PostController@edit_post');
    Route::post('/update/{id}','PostController@update_post');
    
});

Route::get('blogpost','BlogController@all_blog_posts');
Route::get('/singlepost/{id}','BlogController@get_blog_post_by_id');
