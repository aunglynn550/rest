@extends('admin.layouts.master')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Coupon</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Create Coupon</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.coupon.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                      
                            
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Coupon Code</label>
                                <input type="text" name="code" class="form-control" value="{{ old('code') }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Coupon Quantity</label>
                                <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Minimun Purchase Price</label>
                                <input type="text" name="min_purchase_amount" class="form-control" value="{{ old('min_purchase_price') }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Exprie Date</label>
                                <input type="date" name="expire_date" class="form-control" value="{{ old('expire_date') }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Discount Type</label>
                                <select name="discount_type" class="form-control">
                                    <option value="1">Percent</option>
                                    <option value="0">Amount ({{ config('settings.site_currency_icon') }})</option>
                                </select>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Discount Amount</label>
                                <input type="text" name="discount" class="form-control" value="{{ old('discount') }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div><!-- end form-group -->
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                  </div>
                  <!-- end card-body -->
            </div>
            <!-- end card-primary -->
        </section>

@endsection