@extends('layouts.main')
 
@section('content')
{{-- <head>
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
</head> --}}
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <h2>  Home</h2>
           
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                     
                        <h4 class="page-title">Products</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
           
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="/images/{{$product->product_image}}" alt="contact-img" title="contact-img" class="rounded me-3" width="50%" />
                            <p class="m-0 d-inline-block align-middle font-16">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <a href="#" class="btn btn-primary">BUY NOW</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
      
            <!-- end row -->        
            
        </div> 

        @yield('content')

    </div> <!-- content -->

    <!-- Footer Start -->
   @include('layouts.footer')
    <!-- end Footer -->

</div>
@endSection