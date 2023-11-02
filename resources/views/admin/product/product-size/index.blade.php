@extends('admin.layouts.master')

@section('content')
<section class="section">
          <div class="section-header">
            <h1>Products Variants ({{ $product->name }})</h1>
          </div>
          <div>
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary mb-3"> Go Back</a>
          </div>

          <div class="row">
            <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Create Product Sizes</h4>                                      
                        </div>
                        <div class="card-body">
                                
                                    <form action="{{ route('admin.product-size.store') }}" method="POST" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input name="name" type="text" class="form-control">
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                </div>
                                            </div>
                                            <!-- end col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input name="price" type="text" class="form-control">                                    
                                                </div>
                                            </div>
                                            <!-- end col-md-6 -->
                                        </div>
                                        
                                    
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </form>
                            
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card-primary -->

                    <div class="card card-primary">
                        
                        <div class="card-body">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($sizes as $size)
                                <tr>
                                    <td>{{ ++$loop->index }}</td>
                                    <!-- $loop is the Global variable which is accessable inside the loop -->
                                    <td>{{ $size->name }}</td>
                                    <td>{{ $size->price }}</td>
                                    <td>
                                        <a href="{{ route('admin.product-size.destroy',$size->id) }}" class='delete-item btn btn-danger mx-2'><i class='fa fa-trash'></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @if(count($sizes)===0)
                                <tr>
                                    <td colspan='3' class="text-center">Oop :( No Data Found !</td>
                                </tr>
                                @endif
                            </tbody>
                                
                            </table>
                        </div>
                        <!-- end card-body -->
                </div>
                <!-- end card-primary -->

            </div>
            <!-- end col-md-6 -->

            <div class="col-md-6">

            <div class="card card-primary">
                        <div class="card-header">
                            <h4>Create Product Options</h4>                                      
                        </div>
                        <div class="card-body">
                                
                                    <form action="{{ route('admin.product-option.store') }}" method="POST" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input name="name" type="text" class="form-control">
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                </div>
                                            </div>
                                            <!-- end col-md-6 -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input name="price" type="text" class="form-control">                                    
                                                </div>
                                            </div>
                                            <!-- end col-md-6 -->
                                        </div>
                                        
                                    
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </form>
                            
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card-primary -->
                    <div class="card card-primary">
                        
                        <div class="card-body">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($options as $option)
                                <tr>
                                    <td>{{ ++$loop->index }}</td>
                                    <!-- $loop is the Global variable which is accessable inside the loop -->
                                    <td>{{ $option->name }}</td>
                                    <td>{{ $option->price }}</td>
                                    <td>
                                        <a href="{{ route('admin.product-option.destroy',$option->id) }}" class='delete-item btn btn-danger mx-2'><i class='fa fa-trash'></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @if(count($options)===0)
                                <tr>
                                    <td colspan='3' class="text-center">Oop :( No Data Found !</td>
                                </tr>
                                @endif
                            </tbody>
                                
                            </table>
                        </div>
                        <!-- end card-body -->
                </div>
                <!-- end card-primary -->
            </div>
                <!-- end col-md-6 -->
          </div>
          <!-- end row -->
         
           
        </section>

@endsection

