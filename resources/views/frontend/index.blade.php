@extends('frontend.main_master')
@section ('content')

@section('title')
Mini Market GH||Ghana's Safest Online Shop
@endsection


		<!-- /NAVIGATION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
				<!-- HOT DEAL SECTION -->
		<div id="hot-deal1" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal1" alt="">
							<h2 class="text-uppercase">hot deals this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->
					<!-- /shop -->










		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
							</div>
						</div>
					</div>
					<!-- /section title -->


					<!-- Products tab & slick -->
					<div class="col-md-12 col-3 col-xl-3">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="all" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">

										<!-- product -->
										@foreach($products as $product)
										<div class="product">
											<div class="product-img" >
												<img  src="{{ asset($product->product_thambnail) }}" alt="">
                                                vvv
												<div>
                                                    <div class="product-label">
														@php
									$amount = (int)$product->selling_price - (int) $product->discount_price;
									$discount = ($amount/$product->selling_price) * 100;
															@endphp
												@if($product->discount_price == NULL)
													<span class="new">No discount</span>
													@else
												<span class="new">-{{ round($discount) }}%</span>
												@endif
												</div>
												</div>

											</div>
											<div class="product-body">
												<!-- <p class="product-category">Category</p> -->
												<h3 class="product-name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug )}}">{{ $product->product_name }}</a></h3>


												@if ($product->discount_price == NULL)
												<h4 class="product-price">GH₵{{ number_format($product->selling_price) }}</del></h4>
												@else
												<h4 class="product-price">GH₵{{ number_format($product->discount_price) }} <del class="product-old-price">GH₵{{ number_format($product->selling_price) }}</del></h4>
												@endif
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="product-btns">
                                                    {{-- @auth() --}}
                                                    @livewire('wish-list.add-product-to-wish-list',
                                                       ['product_id' => $product->id, 'user_id' => 12 ]
                                                    )
                                                    {{-- @endauth --}}
											   <button
                                               {{-- wire:click.prefetch="showPost({{ $contact->id }})" --}}
                                               wire:click='AddWishList({{ $product->id }})'
                                                class="add-to-wishlist" title="Wishlist" id="{{ $product->id }}" ><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button  class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button data-toggle="modal" data-target="#exampleModal" class="add-to-cart-btn" id="{{ $product->id }}" onclick="productView(this.id)"><i class="fa fa-shopping-cart"></i> add to cart</button>

											</div>
										</div>
										<!-- /product -->
										@endforeach


									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->






<!-- Products tab & slick catwise -->
					<!-- Products tab & slick -->




				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<!-- <div id="hot-deal" class="section"> -->
			<!-- container -->
			<!-- <div class="container"> -->
				<!-- row -->
			<!--	<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div> -->
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Hot Deals</h3>
							<div class="section-nav">
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->

					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										@foreach($hot_deals as $product)
										<div class="product">
											<div class="product-img">
												<img  src="{{ asset($product->product_thambnail) }}" alt="">
												<div class="product-label">
												@php
									$amount = (int)$product->selling_price - (int) $product->discount_price;
									$discount = ($amount/$product->selling_price) * 100;
															@endphp
												@if($product->discount_price == NULL)
													<span class="new">No discount</span>
													@else
												<span class="new">-{{ round($discount) }}%</span>
												@endif
												</div>
											</div>

											<div class="product-body">
												<p class="product-category">Category</p>
					<h3 class="product-name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug )}}">{{ $product->product_name }}</a></h3>

					@if ($product->discount_price == NULL)
					<h4 class="product-price">GH₵{{ number_format($product->selling_price) }}</del></h4>
					@else
					<h4 class="product-price">GH₵{{ number_format($product->discount_price) }} <del class="product-old-price">GH₵{{ number_format($product->selling_price) }}</del></h4>
					@endif
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										@endforeach
										<!-- /product -->



									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>

					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">{{  $skip_subcategory_1->subcategory_name }}</h3>
							<div class="section-nav">

							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->

					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										@foreach($skip_subcategory_product_1 as $product)
										<div class="product">
											<div class="product-img">
												<img  src="{{ asset($product->product_thambnail) }}" alt="">
												<div class="product-label">
												@php
									$amount = (int)$product->selling_price - (int) $product->discount_price;
									$discount = ($amount/$product->selling_price) * 100;
															@endphp
												@if($product->discount_price == NULL)
													<span class="new">No discount</span>
													@else
												<span class="new">{{ round($discount) }}% Off</span>
												@endif
												</div>
											</div>

											<div class="product-body">
					<h3 class="product-name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug )}}">{{ $product->product_name }}</a></h3>

					@if ($product->discount_price == NULL)
					<h4 class="product-price">GH₵{{ number_format($product->selling_price) }}</del></h4>
					@else
					<h4 class="product-price">GH₵{{ number_format($product->discount_price) }} <del class="product-old-price">GH₵{{ number_format($product->selling_price) }}</del></h4>
					@endif
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										@endforeach
										<!-- /product -->



									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>

					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>



		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">

			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->
    @endsection
