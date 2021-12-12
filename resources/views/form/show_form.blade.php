@extends('layouts.shop_layout')
@section('content');

    <form action="{{\route('postForm')}}" method="post">
        @csrf
        <input type="text" name="name">
        <button type="submit">send</button>
    </form>
@endsection;
