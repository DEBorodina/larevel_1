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
                        <a href="{{route('admin.product.create')}}" class="btn btn-sm btn-success">Create</a>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>id</th>
                            <th>Product name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$loop->iteration + (($products->currentPage() - 1) * $products->perPage())}}</td>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>
                                    <a href="{{route('admin.product.show',compact('product'))}}">show</a>
                                    <a href="{{route('admin.product.edit',compact('product'))}}">edit</a>
                                    <form action="{{route('admin.product.destroy',compact('product'))}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>
            </div>
        </div>

    </div>
@endsection
