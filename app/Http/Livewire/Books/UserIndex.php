<?php

namespace App\Http\Livewire\Books;
use App\Models\Book;
use App\Models\borrow;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
class UserIndex extends Component
{
    use WithPagination;

    public $search  = '';
    public $orderBy = 'id';
    public $perPage  = 10;
    public $orderAsc = true;
    public $student_id ;
    public function render()
    {
    
        return view('livewire.books.user-index', [
            'books' => Book::searchBook($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
                ,'borrows' => borrow::where('student_id', Auth::user()->id)->get()
            
        ]);
    }
}
///'borrows' => borrow::where('student_id', Auth::user()->id)->get()