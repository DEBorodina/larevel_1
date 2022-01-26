<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class WishListController extends Controller
{
    public function index(){
        $products = session()->get('count',[]);
        $productNames = [];
        foreach ($products as $product => $number ){
            $productNames[Product::find($product)->name]=$number;
        }
        return view('wishList',compact('productNames'));
    }

    public function addToWishList(Request $request){
       session()->increment('count.'.$request->get('product_id'));
       return redirect()->to(route('wishList'));
    }
}
