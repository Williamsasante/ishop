<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="csrf-token" content="{{ csrf_token() }}">
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


	  <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Add to Cart Product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	  <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

       <div class="row">

        <div class="col-md-4">

            <div class="card" style="width: 18rem;">
			<img src=" " class="card-img-top" alt="..." style="height: 200px; width: 180px;" id="pimage">
  <div class="card-body">
   
  </div>
</div>

        </div><!-- // end col md -->


        <div class="col-md-4">

     <ul class="list-group">
	 <li class="list-group-item">Product Price: <strong id="price"></strong> </li>
  <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
  <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
  <li class="list-group-item">SubCategory: <strong id="psubcategory"></strong></li>
</ul>

        </div><!-- // end col md -->


        <div class="col-md-4">

            <div class="form-group">
    <label for="exampleFormControlSelect1">Choose Color</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>

        </div><!-- // end col md -->
		<div class="col-md-4">

<div class="form-group">
<label for="exampleFormControlSelect1"> Quantity</label>
<input class="form-control" id="exampleFormControlInput1" type="number" value="1" min="1">

		</input>
</div>

</div><!-- // end col md -->
<button type="submit" class="btn btn-primary mb-2">Add to Cart</button>


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
			// console.log(data)
            $('#pname').text(data.product.product_name);
            $('#price').text(data.product.selling_price);
            $('#pcode').text(data.product.product_code);
            $('#pcategory').text(data.product.category.category_name);
            $('#pbrand').text(data.product.subcategory.subcategory_name);
            $('#pimage').attr('src','/'+data.product.product_thambnail);
        }
    })
 
}
</script>








      
     
	</body>
</html>
