<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Sale;
class DateSale extends Component
{
    public $sale_date;
    public $status;
    public function mount(){
     $sale=Sale::find(2);

     $this->sale_date=$sale->sake_date;
     $this->status=$sale->status;

    }

    public function updateTime(){
        $sale=Sale::find(2);
        $sale->sake_date=$this->sale_date;
        $sale->status=$this->status;
        $sale->save();
        session()->flash('message','success');
    }
    public function render()
    {
        return view('livewire.admin.date-sale')->layout('layouts.base');
    }
}
