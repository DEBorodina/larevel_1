@extends('layouts.admin_layout')
@section('content')    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="text-danger">{{ $error }}</p>
    @endforeach
@endif

    <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name">
        <br>
        <input type="checkbox" name="status" value="1">
        <br>
        <button type="submit" class="btn btn-sm btn-success">Create</button>
        <br>
    </form>
@endsection
