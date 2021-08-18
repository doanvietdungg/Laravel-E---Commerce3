<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
class DetailOrderUser extends Component
{ public $ids;
    public function mount($id){
        $this->ids=$id;
    }
    public function delete($id){

        slide::find($id)->delete();
        session()->flash('message','Deleted');
    }

    public function render()
    {
        $order=Order::where('user_id',Auth::user()->id)->where('id',$this->ids)->first();
        return view('livewire.user.detail-order-user',['order'=>$order])->layout('layouts.base');
    }
}
