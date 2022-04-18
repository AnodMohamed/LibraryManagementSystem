<?php

namespace App\Http\Livewire\Borrows;

use App\Models\borrow;
use Livewire\Component;

class PendingBorrowingRequests extends Component
{
    public function render()
    {
        $peddings = borrow::where('status','Pending')->latest() ->get();

        return view('livewire.borrows.pending-borrowing-requests',['peddings'=>$peddings]);
    }
}
