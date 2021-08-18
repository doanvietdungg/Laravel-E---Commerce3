<?php

namespace App\Http\Livewire\Admin;
use App\Models\slide;
use Livewire\Component;
use Livewire\WithPagination;
class Honeslyder extends Component
{
    use WithPagination;
    public function delete($id){

        slide::find($id)->delete();
        session()->flash('message','Deleted');
    }
    public function render()
    {
        $data['slide']=slide::paginate(10);
        return view('livewire.admin.honeslyder',$data)->layout('layouts.base');
    }
}
