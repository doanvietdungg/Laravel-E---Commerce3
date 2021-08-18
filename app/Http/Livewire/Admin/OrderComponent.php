<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
class OrderComponent extends Component
{
    use WithPagination;
    public function delete($id){
        $this->ids=$id;
        Order::find($id)->delete();
        session()->flash('message','Deleted');
    }
    public function render()
    {
        $order=Order::paginate(10);
        return view('livewire.admin.order-component',['order'=>$order])->layout('layouts.base');
    }
}
