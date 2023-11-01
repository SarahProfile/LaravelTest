@extends('layouts.main')
 
@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
        <h2>Add a Product</h2>
        <form action="{{ route('product.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Product Code</label>
                <input type="text" name="productCode" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="describtion">Description</label>
                <textarea name="describtion" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="image_url">Image URL</label>
                <input type="file" accept="images/*" name="image" class="form-control" required>
            </div>
            {{-- <div class="form-group">
                <label for="categories">Categories</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $item)
                    
                       <option value="{{$item->id}}"  >{{$item->name}}</option>
                    @endforeach
                    </select>
               
            </div> --}}
            <div class="form-group">
                <select name="category_id" class="form-select"  >
                    <option value="" selected>Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div> </div> </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@endsection
