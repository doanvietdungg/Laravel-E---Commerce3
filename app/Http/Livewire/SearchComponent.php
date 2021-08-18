<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Cart;
class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $search;
    public $product_cate;
    public $product_cate_id;
    public function mount(){
        $this->sorting="default";
        $this->pagesize=10;
        $this->product_cate="All category";
        $this->fill(request()->only('search','product_cate','product_cate_id'));
    }
    use WithPagination;



    public function render()
    {
        if($this->sorting=="date"){
            $data=Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cate_id.'%')->orderBy('created_at','ASC')->paginate($this->pagesize);

        }
        else if($this->sorting=="price"){
            $data=Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cate_id.'%')->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }

        else{
        $data=Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cate_id.'%')->orderBy('regular_price','DESC')->paginate($this->pagesize);
    }

       // $data['Product']=Product::paginate(10);
        $dataCate['cate']=Category::all();
        return view('livewire.search-component',['Product'=>$data],$dataCate)->layout('layouts.base');
    }
}
