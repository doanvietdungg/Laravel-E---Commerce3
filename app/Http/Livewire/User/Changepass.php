<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Changepass extends Component
{

    public $old_pass;
    public $new_pass;
    public $confirm_password;

    public function update($filed){
        $this->validateOnly($filed,[
            'old_pass'=>'required',
            'new_pass'=>'required|min:8|different:old_pass'
        ]);
    }

    public function changepass(){

      $this->validate([
            'old_pass'=>'required',
            'new_pass'=>'required|min:8|different:old_pass'
      ]);
        if(Hash::check($this->old_pass,Auth::user()->password)){
            $user=User::findOrFail(Auth::user()->id);
            $user->password=Hash::make($this->new_pass);
            if($this->new_pass==$this->confirm_password){
                $user->save();
                session()->flash('message','ok');
            }
           else {
                session()->flash('error','comfirm pass ko giống pass');
           }
        }
        else{
            session()->flash('message','fail');
        }
    }
    public function render()
    {
        return view('livewire.user.changepass')->layout('layouts.base1');
    }
}
