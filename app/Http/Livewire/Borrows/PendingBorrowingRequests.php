<?php

namespace App\Http\Livewire\Borrows;

use App\Models\borrow;
use Livewire\Component;

class PendingBorrowingRequests extends Component
{
    public $search  = '';
    public $orderBy = 'id';
    public $perPage  = 10;
    public $orderAsc = true;
    
    public function render()
    {

        $peddings = borrow::searchBorrow($this->search)
        ->where('status','Pending')
        ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);

        return view('livewire.borrows.pending-borrowing-requests',['peddings'=>$peddings]);
    }
}
