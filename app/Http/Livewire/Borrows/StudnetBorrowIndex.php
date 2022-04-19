<?php

namespace App\Http\Livewire\Borrows;

use App\Models\borrow;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudnetBorrowIndex extends Component
{
    public $search  = '';
    public $orderBy = 'id';
    public $perPage  = 10;
    public $orderAsc = true;
    
    public function render()
    {
        $borrows = borrow::searchBorrow($this->search)
        ->where('student_id',Auth::user()->id)
        ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);

        return view('livewire.borrows.studnet-borrow-index',['borrows'=>$borrows]);
    }
}
