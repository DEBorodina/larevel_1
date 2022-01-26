@extends('layouts.shop_layout')
@section('content')
    <h1>Wishlist</h1>
    @foreach ($productNames as $name => $number )
        <p>{{$name}} - {{$number}}</p>
    @endforeach
@endsection
