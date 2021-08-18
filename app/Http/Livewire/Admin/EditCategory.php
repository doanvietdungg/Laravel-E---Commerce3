<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
class EditCategory extends Component
{
    public $category_id;
    public $category_slug;
    public $slug;
    public $name;
    public function mount($slug){
        $this->category_slug=$slug;
        $category=Category::where('slug',$this->category_slug)->first();
        $this->category_id=$category->id;
    $this->slug=$category->slug;
    $this->name=$category->name;

       }


    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }
    public function updated($fields){
        $this->validateOnly($fields,[
          'name'=>'required',
          'slug'=>'required|unique:categories'
        ]);
  }
    public function update(){

        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
        $category=Category::find($this->category_id);
        $category->name=$this->name;
        $category->slug=$this->slug;
        $category->save();
        session()->flash('message','updated');
    }
    public function render()
    {

        return view('livewire.admin.edit-category')->layout('layouts.base');
    }
}
