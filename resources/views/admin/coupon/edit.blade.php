@extends('admin.layouts.master')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Coupon</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Update Coupon</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.coupon.update',$coupon->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $coupon->name }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Coupon Code</label>
                                <input type="text" name="code" class="form-control" value="{{ $coupon->code }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Coupon Quantity</label>
                                <input type="text" name="quantity" class="form-control" value="{{ $coupon->quantity }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Minimun Purchase Price</label>
                                <input type="text" name="min_purchase_amount" class="form-control" value="{{ $coupon->min_purchase_amount }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Exprie Date</label>
                                <input type="date" name="expire_date" class="form-control" value="{{ $coupon->expire_date }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Discount Type</label>
                                <select name="discount_type" class="form-control">
                                    <option @selected($coupon->discount_type === percent) value="percent">Percent</option>
                                    <option @selected($coupon->discount_type === amount) value="amount">Amount ({{ config('settings.site_currency_icon') }})</option>
                                </select>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Discount Amount</label>
                                <input type="text" name="discount" class="form-control" value="{{ $coupon->discount }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option @selected($coupon->status === 1) value="1">Yes</option>
                                    <option @selected($coupon->status === 0) value="0">No</option>
                                </select>
                            </div><!-- end form-group -->
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                  </div>
                  <!-- end card-body -->
            </div>
            <!-- end card-primary -->
        </section>

@endsection