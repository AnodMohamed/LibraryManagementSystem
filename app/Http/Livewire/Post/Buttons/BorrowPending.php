<?php

namespace App\Http\Livewire\Buttons;

use App\Models\borrow;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Null_;

class BorrowPending extends Component
{
    public borrow $pending;
    public $status;
    public $releaseDate;
    public $borrow_id;

    public function mount()
    {
        $this->borrow_id = $this->pending->getAttribute('id');
    }

    public $confirmingPending = false;

    public function confirmPending()
    {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-reservation-borrow');
        $this->confirmingPending = true;
    }


    public function reservationborrow()
    {
        if($this->status == 'Acceptable'){

            $this->validate([
          
                'releaseDate' => 'required|date|after:today',

            ]);

        }
        
        if($this->status == ''){

            $this->validate([
          
                'status' => 'required',
            ]);

        }
        

           
       
                
        $borrow = borrow::find($this->borrow_id);

        $borrow->status=$this->status;
        
        if($this->status == 'Acceptable'){

            $borrow->releaseDate=$this->releaseDate;

        }


        $borrow->save();

        session()->flash('success', 'Has been done Successfully...');

        return redirect()->route('borrows.pending');
        
    }
    public function render()
    {
        return view('livewire.buttons.borrow-pending');
    }
}
