<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use App\Models\borrow;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search  = '';
    public $orderBy = 'id';
    public $perPage  = 10;
    public $orderAsc = true;

    public function render()
    {


        return view('livewire.books.index', [
            'books' => Book::searchBook($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }
}
