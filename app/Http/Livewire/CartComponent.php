<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

use App\Models\Coupons;
use Cart ;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public $havecode;
    public $codeCoupons;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        //  $products=Cart::instance('Saveforlater')->get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
        $this->emitTo('cart-count', 'refreshComponent');
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        // $products=Cart::instance('Saveforlater')->get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
        $this->emitTo('cart-count', 'refreshComponent');
    }
    public function deleteCart($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count', 'refreshComponent');
        session()->flash('seccess_message', 'removed Cart');
    }

    public function deleteAllCart()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count', 'refreshComponent');
        session()->flash('seccess_message', 'removed Cart');
    }

    public function switchSaveforLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('Saveforlater')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count', 'refreshComponent');
        session()->flash('seccess_message', 'Save successfuly');
    }

    public function checkout()
    {
        if (Auth::check()) {
            return \redirect('/Checkout');
        } else {
            return redirect()->route('login');
        }
    }

    public function moveSave($rowId)
    {
        $item = Cart::instance('Saveforlater')->get($rowId);
        Cart::instance('Saveforlater')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count', 'refreshComponent');
        session()->flash('success_message', 'move successfully');
    }
    public function deleteSave($rowId)
    {
        Cart::instance('Saveforlater')->remove($rowId);
        session()->flash('s_success_message', 'delete successfuly');
    }
    public function applyCodeConpons()
    {
        $coupon = Coupons::where('code', $this->codeCoupons)->where('cart_value', '<=', Cart::instance('cart')->subtotal())->where('expiry_date', '<=', Carbon::today())->first();
        if (!$coupon) {
            session()->flash('message', 'coupon code invalid');
            return;
        }

        session()->put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value


        ]);
    }

    public function seAmountforCheckout()
    {
        if (!cart::instance('cart')->count() > 0) {
            session()->forget('checkout');
            return;
        }
        if (session()->has('coupon')) {
            session()->put('checkout', [
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'tax' => $this->taxAfterDiscount,
                'total' => $this->totalAfterDiscount

            ]);
        } else {
            session()->put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total()
            ]);
        }
    }

    public function calculateDiscount()
    {
        if (Session()->has('coupon')) {
            if (Session()->get('coupon')['type'] == 'fixed') {
                $this->discount = session()->get('coupon')['value'];
            } else {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value']) / 100;
            }
            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax')) / 100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
    }

    public function removecoupons()
    {
        session()->forget('coupon');
    }
    public function render()
    {
        if (session()->has('coupon')) {
            if (Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            } else {
                $this->calculateDiscount();
            }
        }
        $this->seAmountforCheckout();
        if(Auth::check()){
          Cart::instance('cart')->store(Auth::user()->email);
          Cart::instance('wishlist')->store(Auth::user()->email);
      }
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
