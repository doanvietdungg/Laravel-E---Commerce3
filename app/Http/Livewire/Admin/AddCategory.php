<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

use Illuminate\Support\Str;
class AddCategory extends Component
{
    public $name;
    public $slug;

    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }

    public function updated($fields){
          $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:categories'
          ]);
    }
    public function soreCategory(){

        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
        $category = new Category;
        $category->name=$this->name;
        $category->slug=$this->slug;
        $category->save();
        session()->flash('Add_category','AddedCategory');

    }
    public function render()
    {
        return view('livewire.admin.add-category')->layout('layouts.base');
    }
}
