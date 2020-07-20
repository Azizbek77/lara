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
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>['status','auth']],function (){
    $groupData = [
        'namespace' => 'Blog\Admin',
        'prefix'=>'admin',
    ];

    Route::group($groupData,function (){
        Route::resource('index','MainController')->names('blog.admin.index');

        Route::resource('orders','OrderController')
            ->names('blog/admin.orders');

    });
});

Route::get('user/index','Blog\User\MainController@index');
