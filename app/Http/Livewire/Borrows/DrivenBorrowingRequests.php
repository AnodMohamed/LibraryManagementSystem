<?php

namespace App\Http\Livewire\Borrows;

use App\Models\borrow;
use Livewire\Component;

class DrivenBorrowingRequests extends Component
{
    public $search  = '';
    public $orderBy = 'id';
    public $perPage  = 10;
    public $orderAsc = true;
    
    public function render()
    {
        $drivens = borrow::searchBorrow($this->search)
        ->where('status','Driven')
        ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);

        return view('livewire.borrows.driven-borrowing-requests',['drivens'=>$drivens]);
    }
}
