<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $order=Order::orderBy('created_at','DESC')->get()->take(10);
        $totalsales=Order::where('status','ordered')->count();
        $totalrevenue=Order::where('status','ordered')->sum('total');
        $todaysale=Order::where('status','ordered')->whereDate('created_at',Carbon::today())->count();
        $todayrevenue=Order::where('status','ordered')->whereDate('created_at',Carbon::today())->sum('total');
        return view('livewire.admin.admin-dashboard-component',[
            'order'=>$order,
            'totalsales'=>$totalsales,
            'totalrevenue'=>$totalrevenue,
            'todaysale'=>$todaysale,
            'todayrevenue'=>$todayrevenue

        ])->layout('layouts.base');
    }
}
