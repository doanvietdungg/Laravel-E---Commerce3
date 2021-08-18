<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
class AdminCategory extends Component
{
    use WithPagination;
    public $ids;
    public function delete($id){
        $this->ids=$id;
        Category::find($id)->delete();
        session()->flash('message','Deleted');
    }
    public function render()
    {
        $data['cate']=Category::paginate(10);
        return view('livewire.admin.admin-category',$data)->layout('layouts.base');
    }
}
