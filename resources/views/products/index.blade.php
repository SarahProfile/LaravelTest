@extends('layouts.main')
 
@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">

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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-5">
                                    <a href="/admin/products/create" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Products</a>
                                </div>
                           
                            </div>
    
                            <div class="table-responsive">
                                <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                                    <thead class="table-light">
                                        <tr>
                                            {{-- <th class="all" style="width: 20px;">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th> --}}
                                            <th class="all">  Serial No</th>
                                            <th class="all">Product Image</th>
                                            <th class="all">Product Name with Code</th>
                                            <th class="all">Cost</th>
                                            <th class="all">Quantity</th>
                                            <th class="all"> Stock Status</th>
                                          
                                            <th style="width: 85px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($products as $product)
                                        <tr>
                                           
                                            <td>
                                                
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">{{$product->id}}</a>
                                                </td>    
                                            <td>
                                               
                                                <img src="/images/{{$product->product_image}}" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                  
                                                </td> 
                                                <td>
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">{{$product->title." ".$product->productCode}}</a>
                                                    <br/>
                                                </td>
                                                <td>
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">{{$product->price."AED"}}</a>
                                                    <br/>
                                                </td>
                                                <td>
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">{{$product->stocks_sum_quantity_added}}</a>
                                                    <br/>
                                                </td>
                                                <td>
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">
                                                        @if ($product->stocks_sum_quantity_added==0)
                                                        <a href="apps-ecommerce-products-details.html" class="text-body" style="backgroun-color: rgb(255, 0, 0)">OUT OF STOCK</a>
                                                      
                                                        @else 
                                                        <a href="apps-ecommerce-products-details.html" class="text-body" style="backgroun-color: rgb(7, 255, 57)">IN STOCK</a>
                                                           
                                                        @endif
                                                      </a>
                                                    <br/>
                                                </td>
                                               
        
                                            <td class="table-action">
                                                <a href="{{route('product.update',['id'=>$product->id])}}" class="badge bg-success" style="font-size: 20px">Edit</a>
                                                {{-- <span class="badge bg-success" style="font-size: 20px ">Edit</span> --}}
                                                <br>
                                                <a href="{{route('adelete.product',['id'=>$product->id])}}" class="badge bg-success" style="font-size: 20px; margin-top:10px">Delete </a>
                                            </td>
                                        </tr>
                                        
                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
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