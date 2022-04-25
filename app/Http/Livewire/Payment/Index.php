<?php

namespace App\Http\Livewire\Payment;

use App\Models\Reversion;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $search  = '';
    public $orderBy = 'id';
    public $perPage  = 10;
    public $orderAsc = true;

    public function render()
    {
        //select * from reversions where id not in (select reversion_id from transactions)
        $unpaids = Reversion::searchFine($this->search)
        ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);
        return view('livewire.payment.index',['unpaids'=>$unpaids]);
    }
}
