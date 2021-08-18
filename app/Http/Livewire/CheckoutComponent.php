<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{Order, Order_item, shipping, transaction};
use Illuminate\Support\Facades\Auth;
use Cart;
use Stripe;

class CheckoutComponent extends Component
{
    public $first_name;
    public $last_name;
    public $email;

    public $line1;
    public $line2;
    public $province;
    public $phone;
    public $country;
    public $zip;
    public $city;


    public $s_last_name;
    public $s_first_name;
    public $s_email;

    public $s_line1;
    public $s_line2;
    public $s_province;
    public $s_phone;
    public $s_country;
    public $s_city;
    public $s_zip;

    public $thankyou;

    public $shipping_address;
    public $paymethod;

    public $card_num;
    public $expiry_ye;
    public $expiry_mo;
    public $cvc;


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',

            'line1' => 'required',
            'line2' => 'required',
            'province' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'paymethod' => 'required'
        ]);

        if ($this->shipping_address) {
            $this->validateOnly($fields, [
                's_first_name' => 'required',
                's_last_name' => 'required',
                's_email' => 'required',

                's_line1' => 'required',
                's_line2' => 'required',
                's_province' => 'required',
                's_phone' => 'required',
                's_country' => 'required',
                's_zip' => 'required',
                's_city' => 'required',
            ]);
        }
    }

    public function placeOrder()
    {
        $this->validate([

            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',

            'line1' => 'required',
            'line2' => 'required',
            'province' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'paymethod' => 'required'


        ]);

        if ($this->paymethod == 'Card') {
            $this->validate([
                'card_num' => 'required',
                'expiry_ye' => 'required',
                'expiry_mo' => 'required',
                'cvc' => 'required',
            ]);
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->first_name = $this->first_name;
        $order->last_name = $this->last_name;
        $order->email = $this->email;
        //  $order->address=$this->address;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->province = $this->province;
        $order->mobile = $this->phone;
        $order->country = $this->country;
        $order->zip_code = $this->zip;
        $order->city = $this->city;
        $order->status = "ordered";
        $order->is_shipping_different = $this->shipping_address ? true : false;
        $order->save();

        // $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new Order_item();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }



        if ($this->shipping_address == true) {

            $this->validate([
                's_first_name' => 'required',
                's_last_name' => 'required',
                's_email' => 'required',

                's_line1' => 'required',
                's_line2' => 'required',
                's_province' => 'required',
                's_phone' => 'required',
                's_country' => 'required',
                's_zip' => 'required',
                's_city' => 'required',
            ]);

            $shipping = new shipping();
            $shipping->order_id = $order->id;

            $shipping->first_name = $this->s_first_name;
            $shipping->last_name = $this->s_last_name;
            $shipping->email = $this->s_email;
            //  $shipping->address=$this->s_address;
            $shipping->line1 = $this->s_line1;
            $shipping->line2 = $this->s_line2;
            $shipping->province = $this->s_province;
            $shipping->mobile = $this->s_phone;
            $shipping->country = $this->s_country;
            $shipping->zip_code = $this->s_zip;
            $shipping->city = $this->s_city;

            $shipping->save();
        }

        if ($this->paymethod == 'ship_cod') {
            $this->Maketransaction($order->id, 'pending');
            $this->resetcard();
        } else if ($this->paymethod == 'Card') {
            $stripe = Stripe::make(env('STRIPE_KEY'));
            try {
                $tokens = $stripe->tokens()->create([
                    'card' => [
                        'number' => $this->card_num,
                        'exp_month' => $this->expiry_mo,
                        'exp_year' => $this->expiry_ye,
                        'cvc' => $this->cvc
                    ]
                ]);
                if (!isset($token['id'])) {
                    session()->flash('stripe_error', 'That bai');
                    $this->thankyou = 0;
                }
                $customer = $stripe->customers()->create([
                    'name' => $this->first_name . ' ' . $this->last_name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'address' => [
                        'line1' => $this->line1,
                        'line2' => $this->line2,
                        'postal_code' => $this->zip,
                        'state' => $this->province,
                        'country' => $this->country

                    ],

                    'shipping' => [
                        'name' => $this->first_name . ' ' . $this->last_name,
                        'address' => [
                            'line1' => $this->line1,
                            'line2' => $this->line2,
                            'postal_code' => $this->zip,
                            'state' => $this->province,
                            'country' => $this->country

                        ],
                    ],
                    'source' => $tokens['id']
                ]);
                $change = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'USD',
                    'amount' => session()->get('checkout')['total'],
                    'description' => 'payment for order no' . $order->id
                ]);
                if ($change['status'] == 'succeeded') {
                    $this->Maketransaction($order->id, 'approve');
                    $this->resetcard();
                } else {
                    session()->flash('stripe_error', 'falied');
                    $this->thankyou = 0;
                }
            } catch (Exception $e) {
                session()->flash('stripe_error', $e->getMessage());
                $this->thankyou = 0;
            }
        }
    }

    public function resetcard()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }
    public function Maketransaction($order_id, $status)
    {
        $trans = new transaction();
        $trans->order_id = $order_id;
        $trans->user_id = Auth::user()->id;
        $trans->mode = $this->paymethod;
        $trans->status = $status;
        $trans->save();
    }
    public function VerifyforCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else if ($this->thankyou) {
            return redirect('/user/SendMail');
        } else if (!session()->get('checkout')) {
            return redirect('/Cart');
        }
    }

    public function render()
    {
        $this->VerifyforCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
