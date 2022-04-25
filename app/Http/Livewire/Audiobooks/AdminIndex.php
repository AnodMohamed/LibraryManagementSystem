<?php

namespace App\Http\Livewire\Audiobooks;

use App\Models\Audiobook;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AdminIndex extends Component
{
    use WithPagination;

    public $orderBy = 'id';
    public $perPage  = 10;
    public $orderAsc = true;

    public function render()
    {
        return view('livewire.audiobooks.admin-index', [
            'audiobooks' => Audiobook::orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }
}
