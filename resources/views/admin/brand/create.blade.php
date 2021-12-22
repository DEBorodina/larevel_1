@extends('layouts.admin_layout')
@section('content')
    @dump($errors)
    <form action="{{route('admin.brand.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name">
        <br>
        <input type="file" name="logo">
        <br>
        <textarea name=description" cols="60" rows="5"></textarea>
        <br>
        <input type="checkbox" name="status" value="1">
        <br>
        <input type="text" name="creation_year">
        <br>
        <button type="submit" class="btn btn-sm btn-success">Create</button>
        <br>
    </form>
@endsection
