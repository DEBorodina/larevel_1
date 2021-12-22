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
                        <a href="{{route('admin.brand.create')}}" class="btn btn-sm btn-success">Create</a>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>id</th>
                            <th>Brand name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{$loop->iteration + (($brands->currentPage() - 1) * $brands->perPage())}}</td>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td>
                                <a href="{{route('admin.brand.show',['brand'=>$brand->id])}}">show</a>
                                <a href="{{route('admin.brand.edit',['brand'=>$brand])}}">edit</a>
                                <form action="{{route('admin.brand.destroy',compact('brand'))}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$brands->links()}}
                </div>
            </div>
        </div>

    </div>
    @endsection
