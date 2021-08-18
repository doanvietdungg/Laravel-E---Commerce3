<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupons;
class CouponsComponent extends Component
{

    public function delete($id){
      
        Coupons::find($id)->delete();
        session()->flash('message','Deleted');
    }
    public function render()
    {
        $coupons=Coupons::all();
        return view('livewire.admin.coupons-component',['coupons'=>$coupons])->layout('layouts.base');
    }
}
