@extends('layouts.admin_layout')
@section('content')    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="text-danger">{{ $error }}</p>
    @endforeach
@endif

<form action="{{route('admin.product.update',['product'=> $product])}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <input type="text" name="name" value="{{$product->name}}">
    <br>
    <input type="file" name="img" >
    <br>
    <textarea name="content" cols="60" rows="5">{{$product->content}}</textarea>
    <br>
    <input type="number" name="price" value="{{$product->price}}">
    <br>
    <input type="checkbox" name="status" value="1"  checked="{{$product->status}}">
    <br>
    <button type="submit" class="btn btn-sm btn-success">Create</button>
    <br>
</form>
@endsection
