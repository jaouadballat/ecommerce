@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
            <div class="panel panel-default">
                <div class="panel-heading text-center">All Product</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <th>Product</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', 
                                                ['id' => $product->id]) }}" 
                                            class="btn btn-xs btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                                        </form>
                                        <td><img src="{{ asset('storage/'.$product->image) }}" height="50px"></td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
