<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckAuth;
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



Route::middleware(['auth','login'])->prefix('admin')->name("admin.")->group(function (){
    Route::resources([
        'brand'=> \App\Http\Controllers\AdminControllers\BrandController::class,
        'category'=>\App\Http\Controllers\AdminControllers\CategoryController::class,
        'product'=>\App\Http\Controllers\AdminControllers\ProductController::class,
    ]);
});

Route::get('show-form',[FormController::class,'showForm'])->name('showForm');
Route::post('show-form',[FormController::class,'postForm'])->name('postForm');

Route::get('cart',[\App\Http\Controllers\CartController::class,'index'])->name('cart');
Route::post('add-to-cart',[\App\Http\Controllers\CartController::class,'addToCart'])->name('addToCart');

Route::get('product/{id?}', [ProductController::class,'index'])->name('show-product');
Route::get('catalog',[ProductController::class,'catalog'])->name('catalog');

Route::get('hello', [App\Http\Controllers\SiteController::class,'index']);

Route::get('test',function(){
    $brand = \App\Models\Brand::find(1);
    $product = \App\Models\Product::find(1);
    \App\Models\Image::create([
        'url'=>'go',
        'imageable'=>$product->id,
        'imageable_type'=>Product::class,
    ]);

    dump($product->brand);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
