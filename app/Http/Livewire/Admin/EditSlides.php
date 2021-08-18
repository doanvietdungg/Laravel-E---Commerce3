<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\slide;
use Carbon\Carbon;
use Livewire\WithFileUploads;
class EditSlides extends Component
{
    use WithFileUploads;
    public $title;
    public $SubTitle;
    public $price;
    public $Link;
    public $image;
    public $status;
    public $newImage;
    public $slide_id;
    public function mount($id){

$slide=slide::find($id);

$this->slide_id=$slide->id;
$this->title=$slide->title;
$this->SubTitle=$slide->subtitle;
$this->price=$slide->price;
$this->Link=$slide->link;
$this->image=$slide->image;
$this->status=$slide->status;

    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'title'=>'required',
            'SubTitle'=>'required',
            'price'=>'required|numeric',
            'Link'=>'required',
            'newImage'=>'required|image'
        ]);
    }
    public function update(){
        $this->validate([
            'title'=>'required',
            'SubTitle'=>'required',
            'price'=>'required|numeric',
            'Link'=>'required',
            'newImage'=>'required|image'
           ]);
        $slide=slide::find($this->slide_id);
        $slide->title=$this->title;
        $slide->subtitle=$this->SubTitle;
        $slide->price=$this->price;
        $slide->link=$this->Link;
        if($this->newImage){
            $imageName=Carbon::now()->timestamp.'.'. $this->newImage->extension();
            $this->newImage->storeAs('Sliders',$imageName);
            $slide->image=$imageName;
        }
        $slide->status=$this->status;
        $slide->save();
        session()->flash('message','Edited slide');
    }
    public function render()
    {
        return view('livewire.admin.edit-slides')->layout('layouts.base');
    }
}
