<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id=null){
        $product = Product::findOrFail($id);
        $products = Product::all();
        return view('product.product',[
            'product' => $product,
            'products' => $products,
        ]);
    }
    public function catalog(){
        $offset = 9;
        $products = Product::where('status',1)->simplePaginate(9);
        $categories = Category::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        return view('product.catalog',[
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }
}
