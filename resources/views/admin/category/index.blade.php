@extends('layouts.admin_layout')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">Basic Table</div>

                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <a href="{{route('admin.category.create')}}" class="btn btn-sm btn-success">Create</a>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>id</th>
                            <th>Category name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->iteration + (($categories->currentPage() - 1) * $categories->perPage())}}</td>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                   <a href="{{route('admin.category.show',compact('category'))}}">show</a>
                                   <a href="{{route('admin.category.edit',compact('category'))}}">edit</a>
                                   <form action="{{route('admin.category.destroy',compact('category'))}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-">Delete</button>
                                   </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>

    </div>
@endsection
