<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Order_item;
class SendMail extends Controller
{
    public function sendmail(){
        $orderid=Order::where('user_id',Auth::user()->id)->max('id');
        $order=Order::where('id',$orderid)->first()->toArray();
        $orderItem=Order_item::where('order_id',$orderid)->paginate(10)->toArray();
        // $detailPrd= dd($orderItem);
            Mail::to(Auth::user()->email)->send(new TestMail($order,$orderItem));
            return \redirect('/Thankyou');
    }
}
