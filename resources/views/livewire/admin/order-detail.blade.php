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

                            <ul class="products-cart">
                                @foreach ($order->orderItems as $item)
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


                            </ul>


                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Order Summary</h4>
                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">$ {{ $order->subtotal }}</b></p>
                                <p class="summary-info"><span class="title">Tax</span><b class="index">${{ $order->tax }}</b></p>
                                <p class="summary-info"><span class="title">Shipping</span><b class="index">Free ship</b></p>
                                <p class="summary-info"><span class="title">Total</span><b class="index"> $ {{ $order->total }} </b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                   Billing Detail
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td>{{ $order->first_name }}</td>
                                <th>Last Name</th>
                                <td>{{ $order->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{ $order->mobile }}</td>
                                <th>email</th>
                                <td>{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <th>Line1</th>
                                <td>{{ $order->line1 }}</td>
                                <th>Line2</th>
                                <td>{{ $order->line2 }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{ $order->mobile }}</td>
                                <th>Province</th>
                                <td>{{ $order->province }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ $order->country }}</td>
                                <th>Zip code</th>
                                <td>{{ $order->zip_code }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                   Shipping Items
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                             <th>First Name</th>
                             <th>Last Name</th>
                             <th>Mobile</th>
                             <th>Email</th>
                             <th>Line1</th>
                             <th>Line2</th>
                             <th>City</th>
                             <th>Province</th>
                             <th>Country</th>
                             <th>Zip Code</th>
                             <th>Create_at</th>
                             <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->shipping as $item)
                                   <tr>
                                       <td>{{ $item->first_name }}</td>
                                       <td>{{ $item->last_name }}</td>
                                       <td>{{ $item->mobile }}</td>
                                       <td>{{ $item->email }}</td>
                                       <td>{{ $item->line1 }}</td>
                                       <td>{{ $item->line2 }}</td>
                                       <td>{{ $item->city }}</td>
                                       <td>{{ $item->province }}</td>
                                       <td>{{ $item->country }}</td>
                                       <td>{{ $item->zip_code }}</td>
                                       <td>{{ $item->created_at }}</td>





                                       <td> <button type="button" onclick="confirm('Are you sure') || event.stopImmediatePropagation()"  class="btn btn-danger"  class="btn btn-danger" wire:click=delete({{ $item->id }})>
                                           Delete
                                         </button></td>
                                   </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                     Transaction Detail
                    </div>

<div class="panel-body">
    <table class="table">

        <tr>
            <th>Mode</th>
            <td>{{ $order->transactions->mode }}</td>
            <th>Status</th>
            <td>{{ $order->transactions->status }}</td>
        </tr>
    </table>
</div>


                </div>
            </div>
        </div>
    </div>

</div>

