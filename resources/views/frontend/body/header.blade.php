<!-- HEADER -->
<header>
	<!-- TOP HEADER -->
	<div id="top-header">
		<div class="container">
			<!-- <ul class="header-links pull-left">
				<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
				<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
				<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
			</ul> -->
			<ul class="header-links pull-right">
				<li><a href="#"><i class="fa fa fa-check"></i> Checkout</a></li>
				<li><a href="#"><i class="fa fa-shopping-cart"></i> Cart</a></li>
				<li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
				<li>
					@auth
					<a href="{{route('login')}}"><i class="icon fa fa-user"></i>{{ Auth::user()->name }}</a>
					@else
					<a href="{{route('login')}}"><i class="icon fa fa-lock"></i>Hello, <b>Login/Register<b></a>
					@endauth

				</li>
			</ul>
		</div>
	</div>
	<!-- /TOP HEADER -->

	<!-- MAIN HEADER -->
	<div id="header">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- LOGO -->
				<div class="col-md-3">
					<div class="header-logo">
						<a href="{{url('/')}}" class="logo">
							<img src="{{asset('frontend/img/logo.png')}}" alt="">
						</a>
					</div>
				</div>
				<!-- /LOGO -->

				<!-- SEARCH BAR -->
				<div class="col-md-6">
					<div class="header-search">
						<form>
							<select class="input-select">
								<option value="0">All Categories</option>
								<option value="1">Category 01</option>
								<option value="1">Category 02</option>
							</select>
							<input class="input" placeholder="Search here">
							<button class="search-btn">Search</button>
						</form>
					</div>
				</div>
				<!-- /SEARCH BAR -->

				<!-- ACCOUNT -->
				<div class="col-md-3 clearfix">
					<div class="header-ctn">
						<!-- Wishlist -->
						<div>
							<a href="#">
								<i class="fa fa-heart-o"></i>
								<span>Your Wishlist</span>
								<div class="qty">2</div>
							</a>
						</div>
						<!-- /Wishlist -->

						<!-- ===== === SHOPPING CART DROPDOWN ===== == -->
						<div class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<i class="fa fa-shopping-cart"></i>
								<span>Your Cart</span>
								<div id="cartQty" class="qty"></div>
							</a>
							<div class="cart-dropdown">
								<div class="cart-list">

						<!-- ===== === MiniCart with Ajax ===== == -->	

					<div id="miniCart">

					</div>
						<!-- ===== === End MiniCart with Ajax ===== == -->	
									<small> Item(s) selected:</small>
									<h5> SUBTOTAL:GH₵ <span class='price'  id="cartSubTotal"> </span></h5>
								</div>
								<div class="cart-btns">
									<a href="#">View Cart</a>
									<a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
							
						</div>
						<!-- ===== === End SHOPPING CART DROPDOWN ===== == -->

						<!-- Menu Toogle -->
						<div class="menu-toggle">
							<a href="#">
								<i class="fa fa-bars"></i>
								<span>Menu</span>
							</a>
						</div>
						<!-- /Menu Toogle -->
					</div>
				</div>
				<!-- /ACCOUNT -->
			</div>
			<!-- row -->
		</div>
		<!-- container -->
	</div>
	<!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
<!-- NAVIGATION -->
<nav id="navigation">
	<!-- container -->
	<div class="container">
		<!-- responsive-nav -->
		<div id="responsive-nav">
			<!-- NAV -->
			<ul class="main-nav nav navbar-nav">
						
			
			<li class=""><a href="{{ url('/') }}">Home</a></li>
			@php
  $categories = App\Models\Category::orderBy('category_name','ASC')->get();
  @endphp

  @foreach($categories as $category)
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>{{ $category->category_name}}</b></a>
					<div class="yamm-content ">
					<div class="row">
					@php
  $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
  @endphp
  @foreach($subcategories as $subcategory)
						<ul id="products-menu" class="dropdown-menu clearfix" role="menu">
							<li><a href="">{{ $subcategory->subcategory_name }}</a></li>
							@endforeach
							</div>
							</div>
			@endforeach
						</ul>
					</li>
			<!-- /NAV -->
		</div>
		<!-- /responsive-nav -->
	</div>
	<!-- /container -->
</nav>