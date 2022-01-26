<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $file = $request->file('img');
        $data = $request->all();
        if($file!=null){
            $file->storeAs('products_images',time().'.'.$file->getClientOriginalExtension(),'public');
            $image = '/storage/products_images/'.time().'.'.$file->getClientOriginalExtension();
            $data['img'] = $image;
        }
        Product::create($data);
        return redirect(route('admin.product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, Product $product)
    {
        $file = $request->file('img');
        $data = $request->all();
        if($file!=null) {
            $file->storeAs('products_images',time().'.'.$file->getClientOriginalExtension(),'public');
            $image = '/storage/products_images/'.time().'.'.$file->getClientOriginalExtension();
            $data['img'] = $image;
            File::delete(public_path(Product::find($product->id)->img));
        }
        $product->fill($data);
        $product->save();
        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        File::delete(public_path(Product::find($product->id)->img));
        $product->delete();
        return redirect(route('admin.product.index'));
    }
}
