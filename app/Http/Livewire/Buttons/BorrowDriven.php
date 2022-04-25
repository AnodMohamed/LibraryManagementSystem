<?php

namespace App\Http\Livewire\Buttons;

use App\Models\Book;
use App\Models\borrow;
use App\Models\Reversion;
use BladeUIKit\Components\DateTime\Carbon;
use Brick\Math\Exception\MathException;
use DateTime;
use Livewire\Component;
use PhpParser\Node\Expr\Cast\String_;
use Ramsey\Uuid\Type\Integer;

class BorrowDriven extends Component
{
    
    public borrow $driven;
    public $received_date;
    public $borrow_id;
    //to calculate fine 
    public $datetime1;
    public $datetime2;
    public $different_days;

    public function mount()
    {
        $this->borrow_id = $this->driven->getAttribute('id');
    }

    public $confirmingDriven = false;

    public function confirmDriven()
    {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-reservation-borrow');
        $this->confirmingDriven= true;
    }


    public function reservationborrow()
    {

        $this->validate([
            'received_date' => 'required|date|after:today',
        ]);

        
                     
        $borrow = borrow::find($this->borrow_id);

        $borrow->status='Received';



        $book_id= $borrow->book_id;

        $book = Book::find($book_id);

        $total = $book->bcopiesInwarehouse;

        $book->bcopiesInwarehouse = $total+1;



        $reversion = new Reversion();

        $reversion->borrow_id = $this->borrow_id;

        $reversion->received_date = $this->received_date;



        $this->datetime1 = new DateTime($this->received_date);

        $this->datetime2 = new DateTime($borrow->DueDate);

        $deff =  $this->datetime2->diff($this->datetime1);

        $this->different_days=$deff->format('%a');


        
        if($this->different_days != '0')
        {
            $reversion->fine =($this->different_days * 5);

        }
        

        $borrow->save();

        $book->save();

        $reversion->save();


        session()->flash('success', 'Has been done Successfully...');

        return redirect()->route('borrows.driven');
        
    }

    public function render()
    {
        return view('livewire.buttons.borrow-driven');
    }
}
