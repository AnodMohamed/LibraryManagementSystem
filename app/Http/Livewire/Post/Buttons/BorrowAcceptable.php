<?php

namespace App\Http\Livewire\Buttons;

use App\Models\Book;
use App\Models\borrow;
use Livewire\Component;

class BorrowAcceptable extends Component
{
    public borrow $acceptable;
    public $copy_number;
    public $DueDate;
    public $borrow_id;

    public function mount()
    {
        $this->borrow_id = $this->acceptable->getAttribute('id');
    }

    public $confirmingAcceptable = false;

    public function confirmAcceptable()
    {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-reservation-borrow');
        $this->confirmingAcceptable = true;
    }


    public function reservationborrow()
    {

        $this->validate([
            'copy_number' => 'required|numeric',
            'DueDate' => 'required|date|after:today',

        ]);

        
                     
        $borrow = borrow::find($this->borrow_id);

        $borrow->copy_number=$this->copy_number;

        $borrow->DueDate=$this->DueDate;

        $borrow->status='Driven';

        $book_id= $borrow->book_id;

        $book = Book::find($book_id);

        $total = $book->bcopiesInwarehouse;

        $book->bcopiesInwarehouse = $total-1;
        
        $borrow->save();

        $book->save();

        session()->flash('success', 'Has been done Successfully...');

        return redirect()->route('borrows.acceptable');
        
    }

    public function render()
    {
        return view('livewire.buttons.borrow-acceptable');
    }
}
