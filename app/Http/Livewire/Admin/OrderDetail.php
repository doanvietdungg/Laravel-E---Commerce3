<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
class OrderDetail extends Component
{
    public $ids;
    public function mount($ids){
        $this->ids=$ids;
    }
    public function delete($id){

        slide::find($id)->delete();
        session()->flash('message','Deleted');
    }

    public function render()
    {
        $order=Order::find($this->ids);
        // dd($order->orderItems);
        return view('livewire.admin.order-detail',['order'=>$order])->layout('layouts.base');
    }
}
