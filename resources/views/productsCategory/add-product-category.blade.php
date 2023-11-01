@extends('layouts.main')
 
@section('content')
    <div class="container">
        <h2>Add a Category</h2>
        <form action="{{ route('product.category.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control" required >
            </div>
           
            
               
           <br>
            <button type="submit" class="btn btn-primary">Add Category</button>
            
        </form>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@endsection
