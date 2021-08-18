<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupons;
class EditCouponsComponent extends Component
{
    public $ids;
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;
    public function mount($id){
      $coupon=Coupons::find($id);
      $this->ids=$coupon->id;
      $this->code=$coupon->code;
      $this->type=$coupon->type;
      $this->value=$coupon->value;
      $this->cart_value=$coupon->cart_value;
      $this->expiry_date=$coupon->expiry_date;
        }
    public function update($fields){
        $this->validateOnly([
            'code'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ]);
    }
    public function updateCoupons(){
        $this->validate([
            'code'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
            ]);
          $coupons=Coupons::find($this->ids);
          $coupons->code=$this->code;
          $coupons->type=$this->type;
          $coupons->value=$this->value;
          $coupons->cart_value=$this->cart_value;
          $coupons->expiry_date=$this->expiry_date;
          $coupons->save();
          session()->flash('message','Edit successfully');
    }
    public function render()
    {
        return view('livewire.admin.edit-coupons-component')->layout('layouts.base');
    }
}
