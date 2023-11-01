
@extends('layouts.main')
 
@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
        <h2>Update  Product</h2>
       
        <form action="{{ route('product.stock.edit',['id'=>$stock->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{$stock->product_id}}" />
            <div class="form-group">
                <label for="name">Product Name</label>
               <select  class="form-select" disabled >
                @foreach($products as $product)
                <option value="{{ $product->id}}">{{ $product->title }}</option>
                @endforeach
               </select>
            </div>
            <div class="form-group">
                <label for="name">Supplier name</label>
                <input type="text"  class="form-control"  value="{{ $stock->supplier_name}}">
            </div>
            <div class="form-group">
                <label for="describtion">Quantity Added</label>
                <input type="text"  class="form-control" disabled value="{{ $stock->quantity_added}}">
            </div>
            <div class="form-group">
                <label for="price">Last date added</label>
                <input type="date" disabled class="form-control" step="0.01"  value="{{ $stock->last_added_date}}">
            </div>
          
            
           
            {{-- Collapse button --}}

            <p>
                
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    add more
                </button>
              </p>
              <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <div class="form-group">
                        <label for="describtion">supplier 2</label>
                        <input type="text" name="supplier_name" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="name">Quantity</label>
                        <input type="number" name="quantity_added" min="1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="describtion">Date</label>
                        <input type="date" name="last_added_date" class="form-control" required>
                    </div>
        
                </div>
              </div>
            {{-- ------------ --}}
          
            <button type="submit" class="btn btn-primary my-2">Update </button>
        </form>
    </div></div></div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
