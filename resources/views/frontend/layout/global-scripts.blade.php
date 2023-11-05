<script>
    // Load Product Model

    function loadProductModel(productId){        
        $.ajax({
            method:'GET',
            url:'{{ route("load-product-model", ":productId") }}'.replace(':productId',productId),  //create a placeholder & replacing it      
            beforeSend: function(){
                $('.overlay-container').removeClass('d-none');
                $('.overlay').addClass('active');
            },
            success: function(response){
               $(".load_product_model_body").html(response);
               $('#cartModal').modal('show');
            },
            error:function(xhr,status,error){
                console.error(error);
            },
            complete:function(){
                $('.overlay').removeClass('active');
                $('.overlay-container').addClass('d-none');
            }
            
        })
    }

    // Update Sidebar cart//
    function updateSidebarCart(){
        $.ajax({
            method:'GET',
            url:'{{ route("get-cart-products") }}',    
            beforeSend: function(){
             
            },
            success: function(response){                
                $('.cart_contents').html(response);
                let cartTotal = $('#cartTotal').val();
                let cartCount = $('#cart_product_count').val();
                $('.cart_subtotal').text("{{ currencyPosition(':cartTotal') }}".replace(':cartTotal',cartTotal));
                $('.cart_count').text(cartCount);
            },
            error:function(xhr,status,error){
                console.error(error);
            },
            complete:function(){
              
            }
            
        })
    }
</script>