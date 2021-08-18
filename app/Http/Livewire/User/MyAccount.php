<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Carbon\Carbon;
class MyAccount extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $address;
    public $new_image;
    public $birthday;
    public $image;

    public function mount(){

       $user=User::where('id',Auth::user()->id)->first();
       $this->name=$user->name;
       $this->email=$user->email;

       $this->address=$user->address;
       $this->image=$user->image;
       $this->birthday=$user->birthday;

    }
    public function Update(){
        $user=User::find(Auth::user()->id);
        $user->name=$this->name;
        $user->email=$this->email;
        $user->address=$this->address;
        $user->birthday=$this->birthday;
        if($this->new_image){
            $imageName=Carbon::now()->timestamp.'.'. $this->new_image->extension();
            $this->new_image->storeAs('Users',$imageName);
            $user->image=$imageName;
        }
        $user->save();
       return \redirect('/user/MyAccount');
    }
    public function render()
    {

        return view('livewire.user.my-acount')->layout('layouts.base1');
    }
}
