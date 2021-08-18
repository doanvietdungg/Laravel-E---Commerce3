<?php

namespace App\Http\Livewire\Admin;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;
class EditProduct extends Component
{
    use WithFileUploads;
    public $product_id;
    public $product_slug;
    public $product_name;
    public $slug;
    public $short_des;
    public $description;
    public $price;
    public $price_sale;
    public $SKU;
    public $status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $newImage;

    public function mount($slug){
        $this->product_slug=$slug;
        $product=Product::where('slug',$this->product_slug)->first();
        //dd($product);
        $this->product_id=$product->id;
        $this->product_name=$product->name;
        $this->slug=$product->slug;
        $this->short_des=$product->short_description;
        $this->description=$product->descriptions;
        $this->price=$product->regular_price;
        $this->price_sale=$product->sale_price;
        $this->SKU=$product->SKU;
        $this->status=$product->stock_status;
        $this->featured=$product->featured;
        $this->quantity=$product->quanity;
        $this->image=$product->image;
        $this->category_id=$product->category_id;
      
 }


public function updated($fields){
    $this->validateOnly($fields,[
        'product_name'=>'required',
        'slug'=>'required|unique:products',
        'short_des'=>'required',
        'description'=>'required',
        'price'=>'required|numeric',
        'price_sale'=>'numeric',
        'SKU'=>'required',
        'quantity'=>'required|numeric',
        'newImage'=>'required|mimes:jpeg,png',
        'category_id'=>'required'
    ]);
}

public function updateProduct(){
    $this->validate([
        'product_name'=>'required',
        'slug'=>'required|unique:products',
        'short_des'=>'required',
        'description'=>'required',
        'price'=>'required|numeric',
        'price_sale'=>'numeric',
        'SKU'=>'required',
        'quantity'=>'required|numeric',
        'newImage'=>'required|mimes:jpeg,png',
        'category_id'=>'required'
    ]);
    $product=Product::find($this->product_id);
    $product->name=$this->product_name;
    $product->slug=$this->slug;
    $product->short_description=$this->short_des;
    $product->descriptions=$this->description;
    $product->regular_price=$this->price;
    $product->sale_price=$this->price_sale;
    $product->SKU=$this->SKU;
    $product->stock_status=$this->status;
    $product->featured=$this->featured;
    $product->quanity=$this->quantity;
    if($this->newImage){
        $imageName=Carbon::now()->timestamp.'.'. $this->newImage->extension();
        $this->newImage->storeAs('products',$imageName);
        $product->image=$imageName;
    }
    $product->category_id=$this->category_id;
    $product->save();
    session()->flash('message','Edited Product');
}
    public function render()
    {
        $data['cate']=Category::all();
        return view('livewire.admin.edit-product',$data)->layout('layouts.base');
    }
}
