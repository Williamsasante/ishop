<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">
    
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		 <title>@yield('title') </title>

		<!-- Google font -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
   
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href=" {{asset('frontend/css/bootstrap.min.css')}}"/>
       
		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/slick.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/slick-theme.css')}}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/nouislider.min.css')}}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

</head>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

    
@include('frontend.body.header')
<!-- ============================================== HEADER : END ============================================== -->
<br>

@yield('content')

<!-- ============================================================= FOOTER : END============================================================= --> 
<br>
@include('frontend.body.footer')
		

     
		<!-- jQuery Plugins -->
		<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
		<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('frontend/js/slick.min.js')}}"></script>
		<script src="{{asset('frontend/js/nouislider.min.js')}}"></script>
		<script src="{{asset('frontend/js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('frontend/js/main.js')}}"></script>
    <script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" 
         integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
         crossorigin = "anonymous">
      </script>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


	  <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span> </strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

       <div class="row">

        <div class="col-md-4">

            <div class="card" style="width: 18rem;">
            <img src=" " class="card-img-top" alt="pimage" style="height: 200px; width: 200px;" id="pimage">
</div>

        </div><!-- // end col md -->


        <div class="col-md-4">

     <ul class="list-group">
     <li class="list-group-item">Product Price: <strong class="text-danger">GH₵<span id="pprice"></span></strong>
<del id="oldprice">GH₵</del>
  <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
  <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
  
  <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="available" style="background: green; color: white;"></span> 
<span class="badge badge-pill badge-danger" id="outofstock" style="background: red; color: white;"></span> 

</ul>

        </div><!-- // end col md -->


        <div class="col-md-4">

            <div class="form-group">
            <label for="color">Choose Color</label>
    <select class="form-control" id="color" name="color">
     
    </select>
  </div>

  <div class="form-group">
            <label for="size">Choose Size</label>
    <select class="form-control" id="size" name="size">
     
    </select>
  </div>

  <div class="form-group">
    <label for="qty">Quantity</label>
    <input type="number" class="form-control" id="qty" value="1" min="1" >
  </div> <!-- // end form group -->
  <input type="hidden" id="product_id">
  <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()" >Add to Cart</button>


        </div><!-- // end col md -->


       </div> <!-- // end row -->
      </div> <!-- // end modal Body -->

    </div>
  </div>
</div>
<!-- End Add to Cart Product Modal -->

<script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
// Start Product View with Modal 
function productView(id){
    // alert(id)
    $.ajax({
        type: 'GET',
        url: '/product/view/modal/'+id,
        dataType:'json',
        success:function(data){
          //console.log(data)
            $('#pname').text(data.product.product_name);
            $('#price').text(data.product.selling_price);
            $('#pcode').text(data.product.product_code);
            $('#pcategory').text(data.product.category.category_name);
            $('#pimage').attr('src','/'+data.product.product_thambnail);
            $('#product_id').val(id);
            $('#qty').val(1);




        
            // Color
    $('select[name="color"]').empty();        
    $.each(data.color,function(key,value){
        $('select[name="color"]').append('<option value=" '+value+' ">'+value+' </option>')
    }) // end color
     // Size
    $('select[name="size"]').empty();        
    $.each(data.size,function(key,value){
        $('select[name="size"]').append('<option value=" '+value+' ">'+value+' </option>')
        if (data.size == "") {
            $('#sizeArea').hide();
        }else{
            $('#sizeArea').show();
        }
    }) // end size


      // Product Price 

      
      if (data.product.discount_price == null) {
                $('#pprice').text('');
                $('#oldprice').text('');
                $('#pprice').text(data.product.selling_price);
            }else{
                $('#pprice').text(data.product.discount_price);
                $('#oldprice').text(data.product.selling_price);
            } // end prodcut price 
            // Start Stock opiton
            if (data.product.product_qty > 0) {
                $('#available').text('');
                $('#outofstock').text('');
                $('#available').text('available');
            }else{
                $('#available').text('');
                $('#outofstock').text('');
                $('#outofstock').text('outofstock');
            } 
            
            
            
            // end Stock Option 

        }


        
    })
    
 
}

// Start Add To Cart Product 
function addToCart(){
        var product_name = $('#pname').text();
        var id = $('#product_id').val();
        var color = $('#color option:selected').text();
        var size = $('#size option:selected').text();
        var quantity = $('#qty').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            data:{
                color:color, size:size, quantity:quantity, product_name:product_name
            },
            url: "/cart/data/store/"+id,
            success:function(data){

              miniCart()
              $('#closeModel').click();
                 // console.log(data)
                // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        })
    }
    // End Add To Cart Product 



</script>

//  Add  To MiniCart Product 
<script type="text/javascript">
     function miniCart(){
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType:'json',
            success:function(response){
              $('span[id="cartSubTotal"]').text(response.cartTotal);
               $('#cartQty').text(response.cartQty);
              var miniCart=""
                
              $.each(response.carts, function(key,value){
                    miniCart += `<div class="product-widget">
                  <div class="product-img">
                    <img src="/${value.options.image}" alt="">
                  </div>
                  <div class="product-body">
                      <h3 class="product-name"><a href="#">${value.name}</a></h3>
                     <h4 class="product-price"><span class="qty"></span>GH₵ ${value.price} * ${value.qty} </h4>
                  </div>
                       <button class="delete" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-close"></i></button>
                  </div>
                         </div>
                  <div class="cart-summary">`
                });

                $('#miniCart').html(miniCart);
                

            }
        })
     }
     miniCart();
     
     /// mini cart remove Start 
    function miniCartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/minicart/product-remove/'+rowId,
            dataType:'json',
            success:function(data){
            miniCart();
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }
 //  end mini cart remove
</script>


        
	</body>
</html>
