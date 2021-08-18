<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Cart;
class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_product;
    public function mount($slug_category){
        $this->sorting="default";
        $this->pagesize=10;
        $this->category_product=$slug_category;
    }


    use WithPagination;

    public function stored($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $category=Category::where('slug',$this->category_product)->first();
        $category_name=$category->name;
        $category_id=$category->id;
        if($this->sorting=="date"){
            $data=Product::where('category_id',$category_id)->orderBy('created_at','ASC')->paginate($this->pagesize);

        }
        else if($this->sorting=="price"){
            $data=Product::where('category_id',$category_id)->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }

        else if($this->sorting=="price-desc"){
        $data=Product::where('category_id',$category_id)->orderBy('regular_price','DESC')->paginate($this->pagesize);
    }
    else{
        $data=Product::where('category_id',$category_id)->paginate($this->pagesize);
    }
       // $data['Product']=Product::paginate(10);
        $dataCate['cate']=Category::all();
        return view('livewire.category-component',['Product'=>$data,'Category'=>$category_name],$dataCate)->layout('layouts.base');
    }
}
