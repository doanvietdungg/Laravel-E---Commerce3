<?php

namespace App\Http\Livewire\Admin;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
class ProductComponent extends Component
{
    use WithPagination;
    public function delete($id){
       
        Product::find($id)->delete();
        session()->flash('message','Deleted');
    }
    public function render()
    {
        $data['prd']=Product::paginate(10);
        return view('livewire.admin.product-component',$data)->layout('layouts.base');
    }
}
