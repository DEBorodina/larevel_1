<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $brands = Brand::paginate(12);
        return view('admin.brand.index',[
            "brands"=>$brands,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateBrandRequest $request
     * @return Response
     */
    public function store(CreateBrandRequest $request)
    {
        $file = $request->file('logo');
        dd($file->storeAs('new_go','new_file1.txt','public'));
        dd(Storage::disk('public')->putFileAs('go',$file,'new2.txt'));
        $brand = Brand::create($request->all());
        return redirect(route('admin.brand.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Brand $brand)
    {
        dd($brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CreateBrandRequest $request,Brand $brand)
    {
        $brand->fill($request->all());
        $brand->save();
        return redirect(route('admin.brand.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect(route('admin.brand.index'));
    }
}
