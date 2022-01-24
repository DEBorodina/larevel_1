<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function index(Request $request){
        $cart = Session::get('cart',[]);
        $productIds = array_keys($cart);
        $products = Product::whereIn('id',$productIds)->get();
        dump($cart);
    }

    public function addToCart(Request $request){
        session()->increment('cart.'.$request->get('product_id'));
        return redirect()->to(route('cart'));
    }
}
