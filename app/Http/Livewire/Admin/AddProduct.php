<?php

namespace App\Http\Livewire\Admin;
use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
class AddProduct extends Component
{
use WithFileUploads;
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
    public $images;



    public function mount(){
        $this->featured='0';
        $this->status='Instock';
    }
    public function generateSlug(){
        $this->slug=Str::slug($this->product_name,'-');
        $this->short_des=Str::slug($this->product_name);
        $this->description=Str::slug($this->product_name,'-');
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
            'image'=>'required|mimes:jpeg,png',
            'category_id'=>'required'
        ]);
  }

    public function addProduct(){

        $this->validate([
            'product_name'=>'required',
            'slug'=>'required|unique:products',
            'short_des'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'price_sale'=>'numeric',
            'SKU'=>'required',
            'quantity'=>'required|numeric',
            'image'=>'required|mimes:jpeg,png',
            'category_id'=>'required'
        ]);
        $product = new Product;
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
        $imageName=Carbon::now()->timestamp.'.'. $this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image=$imageName;
        if($this->images)
{
    $imagesName='';
    foreach($this->images as $key=>$image){
          $imgName=Carbon::now()->timestamp.$key.'.'. $image->extension();
          $image->storeAs('products',$imgName);
          $imagesName=$imagesName.','. $imgName;
    }
    $product->images=$imagesName;
}

        $product->category_id=$this->category_id;
        $product->save();
        session()->flash('message','Added Product');

    }
    public function render()
    {
        $data['cate']=Category::all();
        return view('livewire.admin.add-product',$data)->layout('layouts.base');
    }
}
