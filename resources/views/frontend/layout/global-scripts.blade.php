<script>
    // Load Product Model

    function loadProductModel(productId){        
        $.ajax({
            method:'GET',
            url:'{{ route("load-product-model", ":productId") }}'.replace(':productId',productId),  //create a placeholder & replacing it      
          
            success: function(response){
               $(".load_product_model_body").html(response);
               $('#cartModal').modal('show');
            },
            error:function(xhr,status,error){
                console.error(error);
            },
            
        })
    }
</script>