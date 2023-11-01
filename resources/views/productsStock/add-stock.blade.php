@extends('layouts.main')
 
@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
        <h2>Add a Stock</h2>
        <form action="{{ route('product.stock.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <select name="product_id" class="form-select"  >
                    <option value="" selected>Select Product</option>
                    @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Quantity</label>
                <input type="number" name="quantity_added" min="1" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="describtion">Date</label>
                <input type="date" name="last_added_date" class="form-control" required>
            </div>

            {{-- <div class="form-group">
                <label for="describtion">Supplier name</label>
                <input type="text" name="supplier_name" class="form-control" >
            </div> --}}
            
           
@if ($errors->any())
<div class="alert alert-danger my-2">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
            <br>
            <button type="submit" class="btn btn-primary my-2">SAVE</button>
        </form>
    </div></div></div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@endsection
