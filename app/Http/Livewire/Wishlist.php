<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class Wishlist extends Component
{
    public function stored($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        
        session()->flash('success_message','Item added in Cart');
        $this->emitTo('wishlist-count','refreshComponent');
        $this->emitTo('cart-count','refreshComponent');
    }

    public function AddWishlist($product_id,$product_name,$product_price){
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count','refreshComponent');
}

    public function removeWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem){
            if($witem->id==$product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count','refreshComponent');
                return;

            }
        }

    }
    public function render()
    {
        return view('livewire.wishlist')->layout('layouts.base');
    }
}
