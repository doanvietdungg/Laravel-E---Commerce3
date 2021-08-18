<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{slide,Product,Category,HomeCategories,Sale};
use Cart;
use Illuminate\Support\Facades\Auth;

class Homecomponent extends Component
{
    public function render()
    {
        $slide=slide::all();
      $prd=Product::where('featured','1')->paginate(5);
        $cate=HomeCategories::find(1);
        $cats=explode(',',$cate->sel_categories);
        $categories=Category::whereIn('id',$cats)->get();
        $no_of_product=$cate->no_of_product;
        $product_sale=Product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        $sale=Sale::find(2);
        if(Auth::check()){
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
      }
        return view('livewire.homecomponent',['slide'=>$slide,'prd'=>$prd,'categories'=>$categories,'no_of_product'=>$no_of_product,'product_sale'=>$product_sale,'sale'=>$sale])->layout('layouts.base');
    }
}
