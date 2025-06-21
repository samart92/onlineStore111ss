<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // return view('welcome');
//     $viewData = [];
//     $viewData["title"] = "Home Page - Online Store";
//     return view('home.index')->with("viewData", $viewData);
//     // // return view('home.index',compact('viewData'));
//     // return view('home.index', ['viewData' => $viewData]);
// });
//Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get("/", [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name("home.about");
Route::get('/products', [ProductController::class, 'index'])->name("product.index");
Route::get('/products/{id}', [ProductController::class, 'show'])->name("product.show");

//
Route::middleware('admin')->group(
    function () {
        Route::get('/admin', [AdminHomeController::class, 'index'])->name("admin.home.index");
        Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
        Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
        Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
        Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
        Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");
    }
);

//


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
