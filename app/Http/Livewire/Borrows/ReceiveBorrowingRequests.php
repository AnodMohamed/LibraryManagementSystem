<?php

namespace App\Http\Livewire\Borrows;

use App\Http\Livewire\Buttons\ReservationBook;
use App\Models\borrow;
use App\Models\Reversion;
use Livewire\Component;

class ReceiveBorrowingRequests extends Component
{
    public $search  = '';
    public $orderBy = 'id';
    public $perPage  = 10;
    public $orderAsc = true;


    public function render()
    {
        $receives = borrow::searchBorrow($this->search)
        ->where('status','Received')
        ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);


        return view('livewire.borrows.receive-borrowing-requests',['receives'=>$receives]);
    }
}
