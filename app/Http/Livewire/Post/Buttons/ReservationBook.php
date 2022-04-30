<?php

namespace App\Http\Livewire\Buttons;

use App\Models\Book;
use App\Models\borrow;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReservationBook extends Component
{   
    public Book $book;
    public string $name;
    public $book_id;

    public function mount()
    {
        $this->book_id = $this->book->getAttribute('id');
    }

    public $confirmingReservation = false;

    public function confirmReservation()
    {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-reservation-book');
        $this->confirmingReservation = true;
    }

    public function reservationBook()
    {
        $borrow = new borrow;

        $borrow->student_id  = Auth::user()->id;

        $borrow->book_id  =$this->book_id;

        $borrow->save();

        session()->flash('success', 'Your order has been sent to Admin Successfully... please wait for the request ');

        return redirect()->route('books.index');
    }
    /*
    public function updating($name, $value)
    {
        $this->book->setAttribute($name, $value)->save();
    }
    */
    public function render()
    {
        return view('livewire.buttons.reservation-book');
    }
}
