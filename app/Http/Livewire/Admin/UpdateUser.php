<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class UpdateUser extends Component
{
    use WithFileUploads;
    public $user_id;
    public $name;
    public $email;
    public $utype;
    public $address;
    public $image;
    public $new_image;
    public $birthday;

    public function mount($id)
    {
        $this->user_id = $id;
        $user = User::where('id', $id)->first();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->utype = $user->utype;
        $this->address = $user->address;
        $this->image = $user->image;
        $this->birthday = $user->birthday;
    }

    public function update()
    {
        $user = User::where('id', $this->user_id)->first();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->address = $this->address;
        $user->utype = $this->utype;
        $user->birthday = $this->birthday;
        if ($this->new_image) {
            $imageName = Carbon::now()->timestamp . '.' . $this->new_image->extension();
            $this->new_image->storeAs('Users', $imageName);
            $user->image = $imageName;
        }
        $user->save();
        session()->flash('message', 'Edited Product');
    }

    public function render()
    {
        return view('livewire.admin.update-user')->layout('layouts.base');
    }
}
