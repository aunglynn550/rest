<div class="tab-pane fade " id="v-pills-wishlist" role="tabpanel"
                                    aria-labelledby="v-pills-wishlist-tab2">
                                    <div class="fp_dashboard_body">
                                        <h3>wishlist</h3>
                                        <div class="fp_dashboard_order">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr class="t_header">
                                                            <th>No</th>
                                                            <th>Product</th>                                                            
                                                            <th>Stock</th>                                                        
                                                            <th>Action</th>
                                                            <th></th>
                                                        </tr>
                                                        @foreach($wishlists as $wishlist)
                                                        <tr>
                                                            <td>
                                                                <h5>{{ ++$loop->index }}</h5>
                                                            </td>
                                                        
                                                            <td>
                                                                <h5>#{{ $wishlist->product->name }}</h5>
                                                            </td>
                                                            
                                                            <td>    
                                                                @if($wishlist->product->quantity > 0) 
                                                                    <h5 class="text-success">In Stock</h5>                                                       
                                                                @else
                                                                    <h5 class="text-danger">Out Of Stock</h5>                                                       
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('product.show', $wishlist->product->slug) }}" class="view_invoice">View Product</a>
                                                            </td>
                                                                                                                 
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                      