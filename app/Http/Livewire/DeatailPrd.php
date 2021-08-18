<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Comment;
use Laravelista\Comments\Commentable;
use Cart;
use Illuminate\Support\Facades\Auth;
class DeatailPrd extends Component
{
    use Commentable;
    public $slug;
    public $id_prd;
    public $qty;
    public $user_name;
    public $comment;
    public function mount($slug){
     $this->slug=$slug;
     $prd=Product::where('slug',$this->slug)->first();
     $this->id_prd=$prd->id;
     $this->qty=1;
    }



    public function stored($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function cong(){
        $this->qty++;
     }

     public function tru(){
             if($this->qty>1){
                 $this->qty--;
             }
     }

     public function comment(){

         if(Auth::check()){
            $cmt_prd= new Comment();
            $cmt_prd->comment=$this->comment;
            $cmt_prd->user_id=Auth::user()->id;
            $cmt_prd->product_id=$this->id_prd;
            $cmt_prd->save();
            $this->comment="";

         }
            else{
                return \redirect()->route('login');
            }


     }
    public function render()
    {
     $prd=Product::where('slug',$this->slug)->first();
    $cmt=Comment::where('product_id',$this->id_prd)->paginate(10);
        return view('livewire.deatail-prd',['prd'=>$prd,'cmt'=>$cmt])->layout('layouts.base');

    }
}
