<?php

namespace App\Http\Livewire\Admin;
use App\Models\slide;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;
class AddSlides extends Component
{
    use WithFileUploads;
    public $title;
    public $SubTitle;
    public $price;
    public $Link;
    public $image;
    public $status;

    public function mount(){

        $this->status='active';
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'title'=>'required',
            'SubTitle'=>'required',
            'price'=>'required|numeric',
            'Link'=>'required',
            'image'=>'required|image'
        ]);
    }
    public function AddSlides(){
        $this->validate([
         'title'=>'required',
         'SubTitle'=>'required',
         'price'=>'required|numeric',
         'Link'=>'required',
         'image'=>'required|image'
        ]);
        $slide=new slide;
        $slide->title=$this->title;
        $slide->subtitle=$this->SubTitle;
        $slide->price=$this->price;
        $slide->link=$this->Link;
        $imageName=Carbon::now()->timestamp.'.'. $this->image->extension();
        $this->image->storeAs('Sliders',$imageName);
        $slide->image=$imageName;
        $slide->status=$this->status;
        $slide->save();
        session()->flash('message','Added slide');
    }
    public function render()
    {
        return view('livewire.admin.add-slides')->layout('layouts.base');
    }
}
