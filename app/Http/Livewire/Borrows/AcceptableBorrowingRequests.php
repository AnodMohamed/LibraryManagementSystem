<?php

namespace App\Http\Livewire\Borrows;

use App\Models\borrow;
use Livewire\Component;

class AcceptableBorrowingRequests extends Component
{
    public $search  = '';
    public $orderBy = 'id';
    public $perPage  = 10;
    public $orderAsc = true;
    

    public function render()
    {
        $acceptables = borrow::searchBorrow($this->search)
        ->where('status','Acceptable')
        ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);
  

        return view('livewire.borrows.acceptable-borrowing-requests',['acceptables'=>$acceptables]);
    }
}
