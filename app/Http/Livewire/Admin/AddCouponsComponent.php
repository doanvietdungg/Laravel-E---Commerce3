<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupons;
class AddCouponsComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;
    public function  mount(){
           $this->type='0';
    }
    public function update($fields){
        $this->validateOnly([
            'code'=>'required|unique:coupons',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ]);
    }

    public function AddCoupons(){
        $this->validate([
               'code'=>'required|unique:coupons',
               'value'=>'required|numeric',
               'cart_value'=>'required|numeric',
               'expiry_date'=>'required'
               ]);
        $coupons= new Coupons;
        $coupons->code=$this->code;
        $coupons->type=$this->type;
        $coupons->value=$this->value;
        $coupons->cart_value=$this->cart_value;
        $coupons->expiry_date=$this->expiry_date;
        $coupons->save();
        session()->flash('message','Add coupons successfully');

    }

    public function render()
    {
        return view('livewire.admin.add-coupons-component')->layout('layouts.base');
    }
}
