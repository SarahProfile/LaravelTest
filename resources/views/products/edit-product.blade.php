
@extends('layouts.main')
 
@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
        <h2>Update  Product</h2>
       
        <form action="{{ route('product.edit',['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="title" class="form-control" required  value="{{ $product->title }}">
            </div>
            <div class="form-group">
                <label for="name">Product Code</label>
                <input type="text" name="productCode" class="form-control" required value="{{ $product->productCode}}">
            </div>
            <div class="form-group">
                <label for="describtion">Description</label>
                <textarea name="describtion" class="form-control" required value="">{{$product->describtion}}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" step="0.01" required value="{{ $product->price}}">
            </div>
            <div class="form-group">
                <img src="/images/{{$product->product_image}}" accept="images/*" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />
                <label for="image_url">Image URL</label>
               
                
                <input type="file" name="image" class="form-control" >
            </div>
            <div class="form-group">
                <label for="categories">Categories</label>
                <select class="form-select" name="category_id">
                @foreach ($categories as $item)
                
                   <option value="{{$item->id}}" @if($item->id==$product->category_id) selected @endif >{{$item->name}}</option>
                @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update </button>
        </form>
    </div> </div> </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
@endsection
