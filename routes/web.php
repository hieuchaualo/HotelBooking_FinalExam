<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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


// Route::get('admin', function () {
//     return view('crud');
// });
// Route::get('/admin',[ProductController::class, 'index']);
// Route::post('/admin',[ProductController::class, 'addProduct']);

// Route::get('admin','App\Http\Controllers\ProductController@index');
// Route::post('/admin','App\Http\Controllers\ProductController@addProduct');

// Route::get('hotel','App\Http\Controllers\HotelController@index');
// Route::post('/hotel','App\Http\Controllers\HotelController@addProduct');



Route::get('page','App\Http\Controllers\PageController@getIndex')->name('page');

Route::get('loaiSp','App\Http\Controllers\PageController@getLoaiSp');

Route::get('sp','App\Http\Controllers\PageController@getSp');

Route::get('lienhe','App\Http\Controllers\PageController@lienhe')->name('lienhe');

Route::get('about','App\Http\Controllers\PageController@about')->name('about');

Route::get('chi-tiet-san-pham/{id}','App\Http\Controllers\PageController@getChitiet')->name('chi-tiet-san-pham');

Route::get('loai_sanpham/{type}','App\Http\Controllers\PageController@getLoaiSp')->name('loai_sanpham');

Route::get('database',function(){
   Schema::create('loaiSP', function($table){
       $table -> increments('id');
       $table -> string('ten', 200);
    });
    echo "đã thực hiện lệnh tạo bảng thành công";
});

Route::get('news','App\Http\Controllers\PageController@news')->name('news');


Route::get('pageadmin','App\Http\Controllers\PageController@admin')->name('admin');


Route::get('admin-add-form','App\Http\Controllers\PageController@getAdminAdd')->name('admin-add');
Route::post('admin-add-form','App\Http\Controllers\PageController@postAdminAdd');

Route::get('admin-edit-form/{id}','App\Http\Controllers\PageController@getAdminEdit')->name('admin-edit');
Route::post('admin-edit','App\Http\Controllers\PageController@postAdminEdit');

Route::post('admin-delete/{id}','App\Http\Controllers\PageController@postAdminDelete')->name('admin-delete');


//Hotel mid-term
Route::get('trangchu','App\Http\Controllers\HotelController@trangchu')->name('trangchu');

Route::get('hotel-page-add','App\Http\Controllers\HotelController@getAdminAdd')->name('hotel-page-add');
Route::post('hotel-page-add','App\Http\Controllers\HotelController@postAdminAdd');

Route::get('hotel-page-edit/{id}','App\Http\Controllers\HotelController@getAdminEdit')->name('hotel-page-edit');
Route::post('hotel-page-edit','App\Http\Controllers\HotelController@postAdminEdit');

Route::post('hotel-page-delete/{id}','App\Http\Controllers\HotelController@postAdminDelete')->name('hotel-page-delete');

Route::get('admin','App\Http\Controllers\HotelController@admin')->name('admin');




Route::get('/homepage', function () {
    return view('page.homepage');
});

Route::get('/about', function () {
    return view('page.about');
});
Route::get('/accommodation', function () {
    return view('page.accommodation');
});
Route::get('/elements', function () {
    return view('page.elements');
});
Route::get('/contact', function () {
    return view('page.contact');
});
Route::get('/gallery', function () {
    return view('page.gallery');
});
Route::get('/blog', function () {
    return view('page.blog');
});
Route::get('/blog_detail', function () {
    return view('page.blog_detail');
});

