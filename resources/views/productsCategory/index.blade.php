@extends('layouts.main')
 
@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-5">
                                                <a href="/admin/categories/create" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Category</a>
                                            </div>
                                            <!-- end col-->
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
                                         
                                            <th class="all">Product Category Name </th>
                                           
                                          
                                            <th style="width: 85px;">Actions</th>
                                        </tr>
                                    </thead>
                                                <tbody>
                                                   
                                                @foreach($categories as $category)
                                        <tr>
                                           
                                            <td>
                                                
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">{{$category->id}}</a>
                                                </td>    
                                       
                                                <td>
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">{{$category->name}}</a>
                                                    <br/>
                                                </td>
                                              
                                                
                                                
        
                                            <td class="table-action">
                                                <a href="{{route('product.category.update',['id'=>$category->id])}}" class="badge bg-success" style="font-size: 20px">Edit</a>
                                                {{-- <span class="badge bg-success" style="font-size: 20px ">Edit</span> --}}
                                                <br>
                                                <a href="{{route('delete.category.product',['id'=>$category->id])}}" class="badge bg-success" style="font-size: 20px; margin-top:10px">Delete </a>
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