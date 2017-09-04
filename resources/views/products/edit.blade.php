@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($errors))
        <div class="col-md-8 col-md-offset-2 alert alert-danger">
            @foreach($errors->all() as $error)
                <p class="text-center">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Register a New Product</div>
                <div class="panel-body">
                    <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image"  class="form-control">
                        </div>
                        <div class="form-group">
                            <img src="{{ asset('storage/'.$product->image) }}" width="300px">
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" cols="10" rows="5">{{ $product->description }}</textarea>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
