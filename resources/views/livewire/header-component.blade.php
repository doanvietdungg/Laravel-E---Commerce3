
						<div class="wrap-search center-section">
							<div class="wrap-search-form">
								<form action="/Search" id="form-search-top" name="form-search-top">
									<input type="text" name="search" value=" {{ $search }}" placeholder="Search here...">
									<button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
									<div class="wrap-list-cate">
										<input type="hidden" name="product_cate" value="{{  $product_cate }}" id="product-cate">
                                        <input type="hidden" name="product_cate_id" value="{{  $product_cate_id }}" id="product-cate">
										<a href="#" class="link-control">{{ str_split($product_cate,12)[0] }}</a>
										<ul class="list-cate">
                                            @foreach ($cate as $item)
                                           <a href="/Product_Category/{{ $item->slug }}" data-id="{{ $item->id }}"> <li class="level-0"> {{ $item->name }} </li></a>
                                            @endforeach


										</ul>
									</div>
								</form>
							</div>
						</div>
