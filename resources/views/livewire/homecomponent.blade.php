<main id="main">
		<div class="container">

			<!--MAIN SLIDE-->
			<div class="wrap-main-slide">
				<div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                    @foreach ($slide as $item)
                    <div class="item-slide">
						<img src="{{ asset('assets/images/Sliders') }}/{{ $item->image }}" alt="" class="img-slide">
						<div class="slide-info slide-1">
							<h2 class="f-title">{{ $item->title }} <b>Watches</b></h2>
							<span class="subtitle">{{ $item->subtitle }}</span>
							<p class="sale-info">Only price: <span class="price">${{ $item->price }}</span></p>
							<a href="/Shop" class="btn-link">Shop Now</a>
						</div>
					</div>
                    @endforeach

					<div class="item-slide">
						<img src="{{ asset('assets/images/main-slider-1-2.jpg') }}" alt="" class="img-slide">
						<div class="slide-info slide-2">
							<h2 class="f-title">Extra 25% Off</h2>
							<span class="f-subtitle">On online payments</span>
							<p class="discount-code">Use Code: #FA6868</p>
							<h4 class="s-title">Get Free</h4>
							<p class="s-subtitle">TRansparent Bra Straps</p>
						</div>
					</div>
					<div class="item-slide">
						<img src="{{ asset('assets/images/main-slider-1-3.jpg') }}" alt="" class="img-slide">
						<div class="slide-info slide-3">
							<h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
							<span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
							<p class="sale-info">Stating at: <b class="price">$225.00</b></p>
							<a href="#" class="btn-link">Shop Now</a>
						</div>
					</div>
				</div>
			</div>

			<!--BANNER-->
			<div class="wrap-banner style-twin-default">
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="{{ asset('assets/images/home-1-banner-1.jpg') }}" alt="" width="580" height="190"></figure>
					</a>
				</div>
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="{{ asset('assets/images/home-1-banner-2.jpg') }}" alt="" width="580" height="190"></figure>
					</a>
				</div>
			</div>

			<!--On Sale-->
            @if ($product_sale->count()>0 && $sale->status ==0 && $sale->sake_date > Carbon\Carbon::now())


			<div class="wrap-show-advance-info-box style-1 has-countdown">
				<h3 class="title-box">On Sale</h3>
				<div class="wrap-countdown mercado-countdown" data-expire="{{ Carbon\Carbon::parse($sale->sake_date)->format('Y/m/d h:m:s') }}"></div>
				<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                         @foreach ($product_sale as $item)
                         <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="/Product/{{ $item->slug }}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('assets/images/products') }}/{{ $item->image }}" width="800" height="800" alt="{{ $item->name }}"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span{{ $item->name }}]</span></a>
                                <div class="wrap-price"><span class="product-price">${{ $item->sale_price }}</span></div>
                            </div>
                        </div>
                         @endforeach




				</div>
			</div>
            @endif
			<!--Latest Products-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Latest Products</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="{{ asset('assets/images/digital-electronic-banner.jpg') }}" width="1170" height="240" alt=""></figure>
					</a>
				</div>
               @if ($prd->count()>0)
               <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
@foreach ($prd as $item)
<div class="product product-style-2 equal-elem ">
<div class="product-thumnail">
    <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
        <figure><img src="{{ asset('assets/images/products') }}/{{ $item->image }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
    </a>
    <div class="group-flash">
        <span class="flash-item new-label">new</span>
    </div>
    <div class="wrap-btn">
        <a href="Product/{{ $item->slug }}" class="function-link">quick view</a>
    </div>
</div>
<div class="product-info">
    <a href="#" class="product-name"><span>{{ $item->name }}</span></a>
    <div class="wrap-price"><span class="product-price">${{ $item->price }}</span></div>
</div>
</div>
@endforeach




                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <h2  class="title-box">No product Latest</h2>
               @endif

			</div>

			<!--Product Categories-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Product Categories</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="{{ asset('assets/images/fashion-accesories-banner.jpg') }}" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-control">

						@foreach ($categories as $key=>$item)
                        <a href="#category_{{ $item->id }}" class="tab-control-item {{ $key==0 ? 'active' : '' }}">{{ $item->name }}</a>
                        @endforeach
						</div>
						<div class="tab-contents">
                            @foreach ($categories as $key=>$item)
							<div class="tab-content-item {{ $key==0 ? 'active' : '' }}" id="category_{{ $item->id }}">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

                                    @php
                                    $c_product=DB::table('products')->where('category_id',$item->id)->get()->take($no_of_product)
                                    @endphp
                                      @foreach ($c_product as $item1)
                                      <div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="detail.html" title="{{ $item1->name }}">
												<figure><img src="{{ asset('assets/images/products') }}/{{ $item1->image }}" width="800" height="800" alt="{{ $item1->name }}"></figure>
											</a>
											<div class="group-flash">
												<span class="flash-item new-label">new</span>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{ $item1->name }}</span></a>
											<div class="wrap-price"><span class="product-price">${{ $item1->regular_price }}</span></div>
										</div>
									</div>
                                      @endforeach





								</div>
							</div>
                            @endforeach


						</div>
					</div>
				</div>
			</div>

		</div>

	</main>

    @section('title')
Home
@endsection
@section('class-home')
home-icon
@endsection
