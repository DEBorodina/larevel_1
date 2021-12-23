@extends('layouts.admin_layout')
@section('content')
    <h4>Name: {{$category->name}}</h4>
    <p>Id: {{$category->id}}</p>
    <p>Status: {{$category->status?'active':'not active'}}</p>
    <a href="{{route('admin.category.index')}}"class="btn btn-sm btn-success">Back</a>
@endsection
