<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Livewire\WithPagination;
class OrderComponentUser extends Component
{
    use WithPagination;

    public function render()
    {
        $order=Order::where('user_id',Auth::user()->id)->paginate(10);

        return view('livewire.user.order-component',['order'=>$order])->layout('layouts.base');
    }
}
