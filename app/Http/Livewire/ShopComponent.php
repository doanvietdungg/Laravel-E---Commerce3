<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

use Cart;
use Illuminate\Support\Facades\Auth;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $min_price;
    public $max_price;


    public function mount(){
        $this->sorting="default";
        $this->pagesize=10;
        $this->min_price=1;
        $this->max_price=1000;
    }
    use WithPagination;

    public function stored($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
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
        if($this->sorting=="date"){
            $data=Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','ASC')->paginate($this->pagesize);

        }
        else if($this->sorting=="price"){
            $data=Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }

        else if($this->sorting=="price-desc"){
        $data=Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->pagesize);
    }
    else{
        $data=Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pagesize);
    }
       // $data['Product']=Product::paginate(10);
        $dataCate['cate']=Category::all();
       if(Auth::check()){
         Cart::instance('cart')->store(Auth::user()->email);
         Cart::instance('wishlist')->store(Auth::user()->email);
       }
        return view('livewire.shop-component',['Product'=>$data],$dataCate)->layout('layouts.base');
    }
}
