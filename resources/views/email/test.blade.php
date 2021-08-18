<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <div class="container" style="padding: 30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                         Ordered Detail
                        </div>
                        <div class="panel-body">
                            <div class="wrap-iten-in-cart">
                                @if (session()->has('seccess_message'))
                                <div class="alert alert-success">
                                    <strong>Success</strong> {{ Session::get('seccess_message') }}
                                </div>

                                @endif
                                <h3 class="box-title">Products Name</h3>

                                {{-- <ul class="products-cart">
                                    @foreach ($detailPrd)
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img src="{{ asset('assets/images/products') }}/{{ $item->products->image }}" alt="{{ $item->products->name }}"></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product" href="/Product/{{ $item->products->slug }}">{{ $item->products->name }}</a>
                                        </div>
                                        <div class="price-field produtc-price"><p class="price">${{ $item->price }}</p></div>
                                        <div class="quantity">
                                                    <h5>{{ $item->quantity }}</h5>
                                        </div>
                                        <div class="quantity">
                                        <div class="price-field sub-total"><p class="price">${{ $item->quantity*$item->price }}</p></div>
                                    </li>
                                    @endforeach


                                </ul> --}}


                            </div>
                            <div class="summary">
                                <div class="order-summary">
                                    <h4 class="title-box">Order Summary</h4>
                                    <p class="summary-info"><span class="title">Subtotal</span><b class="index">$ {{ $details['subtotal'] }}</b></p>
                                    <p class="summary-info"><span class="title">Tax</span><b class="index">${{ $details['tax'] }}</b></p>
                                    <p class="summary-info"><span class="title">Shipping</span><b class="index">Free ship</b></p>
                                    <p class="summary-info"><span class="title">Total</span><b class="index"> $ {{ $details['total']}} </b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>

    </div>


</body>
</html>
