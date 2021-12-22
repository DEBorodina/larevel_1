@extends('layouts.admin_layout')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach
    @endif
    <form action="{{route('admin.category.update',['category'=> $category])}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="text" name="name" value="{{$category->name}}">
        <br>
        <input type="checkbox" name="status" value="1" checked="{{$category->status}}">
        <br>
        <button type="submit" class="btn btn-sm btn-success">Create</button>
        <br>
    </form>
@endsection
