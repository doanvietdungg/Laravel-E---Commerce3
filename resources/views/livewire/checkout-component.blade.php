<main id="main" class="main-site">

    <style>
        .summary-item .row-in-form input[type=password], .summary-item .row-in-form input[type=text], .summary-item .row-in-form input[type=tel] {
            font-size: 13px;
            line-height: 19px;
            display: inline-block;
            height: 43px;
            padding: 2px 20px;
            max-width: 300px;
            width: 100%;
            border: 1px solid #e6e6e6;
        }
    </style>
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Checkout</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <form action="" wire:submit.prevent="placeOrder">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrap-address-billing">
                        <h3 class="box-title">Billing Address</h3>
                      <div class="building-address">
                            <p class="row-in-form">
                                <label for="fname">first name<span>*</span></label>
                                <input  type="text" name="fname" value="" placeholder="Your name" wire:model="first_name">
                                @error('first_name') <span class="error text-danger">{{ $message }}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="lname">last name<span>*</span></label>
                                <input  type="text" name="lname" value="" placeholder="Your last name"  wire:model="last_name">
                                @error('last_name') <span class="error text-danger">{{ $message }}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="email">Email Addreess:</label>
                                <input  type="email" name="email" value="" placeholder="Type your email" wire:model="email">
                                @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="phone">Phone number<span>*</span></label>
                                <input  type="text" name="phone" value="" placeholder="10 digits format" wire:model="phone">
                                 @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror

                            </p>
                            <p class="row-in-form">
                                <label for="phone">Line1<span>*</span></label>
                                <input  type="text" name="phone" value="" placeholder="Line1" wire:model="line1">
                                 @error('line1') <span class="error text-danger">{{ $message }}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="phone">Line2<span>*</span></label>
                                <input  type="text" name="phone" value="" placeholder="Line2" wire:model="line2">
                                 @error('line2') <span class="error text-danger">{{ $message }}</span> @enderror
                            </p>


                            <p class="row-in-form">
                                <label for="phone">Province<span>*</span></label>
                                <input  type="text" name="phone" value="" placeholder="Province" wire:model="province">
                                 @error('province') <span class="error text-danger">{{ $message }}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="country">Country<span>*</span></label>
                                <input  type="text" name="country" value="" placeholder="United States" wire:model="country">
                                 @error('country') <span class="error text-danger">{{ $message }}</span> @enderror
                            </p>


                            <p class="row-in-form">
                                <label for="zip-code">Postcode / ZIP:</label>
                                <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="zip">
                                 @error('zip') <span class="error text-danger">{{ $message }}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="city">Town / City<span>*</span></label>
                                <input  type="text" name="city" value="" placeholder="City name" wire:model="city">
                                 @error('city') <span class="error text-danger">{{ $message }}</span> @enderror
                            </p>
                            <p class="row-in-form fill-wife">
                                <label class="checkbox-field">
                                    <input name="different-add"   type="checkbox" wire:model="shipping_address">
                                    <span>Ship to a different address?</span>
                                </label>
                            </p>
                      </div>




                    </div>
                </div>
                @if ($shipping_address)

                <div class="col-md-12">
                    <div class="wrap-address-billing">
                        <h3 class="box-title">Shipping Address</h3>
                        <div class="building-address">

                         <p class="row-in-form">
                             <label for="fname">first name<span>*</span></label>
                             <input  type="text" name="fname" value="" placeholder="Your name" wire:model="s_first_name">
                              @error('s_first_name') <span class="error text-danger">{{ $message }}</span> @enderror
                         </p>
                         <p class="row-in-form">
                             <label for="lname">last name<span>*</span></label>
                             <input  type="text" name="lname" value="" placeholder="Your last name"  wire:model="s_last_name">
                              @error('s_last_name') <span class="error text-danger">{{ $message }}</span> @enderror
                         </p>
                         <p class="row-in-form">
                             <label for="email">Email Addreess:</label>
                             <input  type="email" name="email" value="" placeholder="Type your email" wire:model="s_email">
                              @error('s_email') <span class="error text-danger">{{ $message }}</span> @enderror
                         </p>
                         <p class="row-in-form">
                             <label for="phone">Phone number<span>*</span></label>
                             <input  type="text" name="phone" value="" placeholder="10 digits format" wire:model="s_phone">
                              @error('s_phone') <span class="error text-danger">{{ $message }}</span> @enderror
                         </p>
                         <p class="row-in-form">
                             <label for="phone">Line1<span>*</span></label>
                             <input  type="text" name="phone" value="" placeholder="Line1" wire:model="s_line1">
                              @error('s_line1') <span class="error text-danger">{{ $message }}</span> @enderror
                         </p>
                         <p class="row-in-form">
                             <label for="phone">Line2<span>*</span></label>
                             <input  type="text" name="phone" value="" placeholder="Line2" wire:model="s_line2">
                              @error('s_line2') <span class="error text-danger">{{ $message }}</span> @enderror
                         </p>


                         <p class="row-in-form">
                             <label for="phone">Province<span>*</span></label>
                             <input  type="text" name="phone" value="" placeholder="Province" wire:model="s_province">
                              @error('s_province') <span class="error text-danger">{{ $message }}</span> @enderror
                         </p>
                         <p class="row-in-form">
                             <label for="country">Country<span>*</span></label>
                             <input  type="text" name="country" value="" placeholder="United States" wire:model="s_country">
                              @error('s_country') <span class="error text-danger">{{ $message }}</span> @enderror
                         </p>


                         <p class="row-in-form">
                             <label for="zip-code">Postcode / ZIP:</label>
                             <input type="text" name="zip-code" value="" placeholder="Your postal code" wire:model="s_zip">
                              @error('s_zip') <span class="error text-danger">{{ $message }}</span> @enderror
                         </p>
                         <p class="row-in-form">
                             <label for="city">Town / City<span>*</span></label>
                             <input  type="text" name="city" value="" placeholder="City name" wire:model="s_city">
                              @error('s_city') <span class="error text-danger">{{ $message }}</span> @enderror
                         </p>

                   </div>


                    </div>
                </div>
                @endif
            </div>


            <div class="summary summary-checkout">
                <div class="summary-item payment-method">
                    <h4 class="title-box">Payment Method</h4>
                    @if ($paymethod=="Card")


                    <div class="wrap-address-billing">
                        @if (session()->has('stripe_error'))
                     <div class="alert alert-danger" role="alert">{{ Session::get('stripe_error') }}</div>
                        @endif
                        <p class="row-in-form">
                            <label for="card_number"><span>Card Number</span></label>
                            <input  type="text" name="card_number" value="" placeholder="card_number" wire:model="card_num">
                             @error('s_city') <span class="error text-danger">{{ $message }}</span> @enderror
                        </p>

                        <p class="row-in-form">
                            <label for="expiry_year"><span>Expiry Year</span></label>
                            <input  type="text" name="expiry_year" value="" placeholder="YYYY" wire:model="expiry_ye" >
                             @error('s_city') <span class="error text-danger">{{ $message }}</span> @enderror
                        </p>

                        <p class="row-in-form">
                            <label for="Mouth"><span>Mouth</span></label>
                            <input  type="text" name="citMouthy" value="" placeholder="MM" wire:model="expiry_mo">
                             @error('s_city') <span class="error text-danger">{{ $message }}</span> @enderror
                        </p>

                        <p class="row-in-form">
                            <label for="CVC"><span>CVC</span></label>
                            <input  type="password" name="CVC" value="" placeholder="CVC" wire:model="cvc">
                             @error('s_city') <span class="error text-danger">{{ $message }}</span> @enderror
                        </p>
                    </div>
                    @endif

                    @error('paymethod') <span class="error text-danger">{{ $message }}</span> @enderror
                    <div class="choose-payment-methods">
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-bank" value="ship_cod" type="radio" wire:model="paymethod">
                            <span>Direct Bank Transder</span>
                            <span class="payment-desc">But the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-visa" value="Card" type="radio" wire:model="paymethod">
                            <span>Debit/Credit Card</span>
                            <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-paypal" value="Paypal" type="radio" wire:model="paymethod">
                            <span>Paypal</span>
                            <span class="payment-desc">You can pay with your credit</span>
                            <span class="payment-desc">card if you don't have a paypal account</span>
                        </label>
                    </div>
                    @if (session()->has('checkout'))
                    <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{ Session::get('checkout')['total'] }}</span></p>

                    @endif
                   <button type="submit" class="btn btn-medium">Place order now</button>
                </div>
                <div class="summary-item shipping-method">
                    <h4 class="title-box f-title">Shipping method</h4>
                    <p class="summary-info"><span class="title">Flat Rate</span></p>
                    <p class="summary-info"><span class="title">Fixed $0.00</span></p>

                </div>
            </div>

        </form>

        </div><!--end main content area-->
    </div><!--end container-->

</main>

@section('title')
Checkout
@endsection
@section('class-checkout')
home-icon
@endsection
