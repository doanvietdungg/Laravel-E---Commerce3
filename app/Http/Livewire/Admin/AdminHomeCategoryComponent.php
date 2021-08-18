<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{Category,HomeCategories};
class AdminHomeCategoryComponent extends Component
{
    public $selected_categories =[] ;
    public $numberofprofucts ;
    public function mount(){
$category=HomeCategories::find(1);
$this->selected_categories=explode(',',$category->sel_categories);
$this->numberofprofucts=$category->no_of_product;


}

   public function updateHome_cate(){
       $category=HomeCategories::find(1);
       $category->sel_categories=implode(',',$this->selected_categories);
       $category->no_of_product=$this->numberofprofucts;
       $category->save();
       session()->flash('message','update successfully');

   }
    public function render()
    {
        $data['cate']=Category::all();
        return view('livewire.admin.admin-home-category-component',$data)->layout('layouts.base');
    }
}
