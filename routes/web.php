<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use \App\Models\Product;
use \App\Models\Category;

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
    $data = [
        'name'=>'tablets',
    ];
    Category::create($data);

    $category = new Category();
    $category->name = "laptops";
    $category->status = false;
    $category->save();

    //$product = Product::where('status',true)->get();
   // $product = Product::where('status',true)->where('price','>',1000)->get();
    /*$data = [
        'name'=>'mouse',
        'price'=>1000,
    ];
    $product = Product::create($data);*/
    /*$product = new Product();
    $product->name = "headphones";
    $product->price = 3000;
    $product->save();*/
   /* $product = Product::find(1);
    $product->price = 20000;
    $product->save();*/
   // dd($product);
    return view('main');
});

Route::get('show-form',[FormController::class,'showForm'])->name('showForm');
Route::post('show-form',[FormController::class,'postForm'])->name('postForm');


Route::get('store', function () {
    return view('store');
});

Route::get('product/{id?}', [ProductController::class,'index'])->name('show-product');

Route::get('hello', [App\Http\Controllers\SiteController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
