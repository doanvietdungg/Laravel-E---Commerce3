<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
class UserComponent extends Component
{
    use WithPagination;
    public function delete($id){

        User::find($id)->delete();
        session()->flash('message','Deleted');
    }
    public function render()
    {
        $user=User::paginate(10);

        return view('livewire.admin.user-component',['user'=>$user])->layout('layouts.base');
    }
}
