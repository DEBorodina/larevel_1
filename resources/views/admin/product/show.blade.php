@extends('layouts.admin_layout')
@section('content')
    <h4>Name: {{$product->name}}</h4>
    <p>Id: {{$product->id}}</p>
    <p>Content: {{$product->content}}</p>
    <p>Price: {{$product->price}}</p>
    <p>Status: {{$product->status?'active':'not active'}}</p>
    <p>Brand id:{{$product->brand_id}}</p>
    <img src="{{$product->img}}" width="300px">
    <br>
    <a href="{{route('admin.category.index')}}"class="btn btn-sm btn-success">Back</a>
@endsection
