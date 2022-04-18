<?php

namespace App\Http\Livewire\Buttons;

use Facade\FlareClient\Stacktrace\File as StacktraceFile;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class DeleteBook extends Component
{
    public $book;
    public $confirmingBookDeletion = false;

    public function confirmBookDeletion()
    {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-delete-book');
        $this->confirmingBookDeletion = true;
    }

    public function deleteBook()
    {
       // File::delete(storage_path('app/public/images/' . $this->book->cover_image));
        $this->book->delete();

        session()->flash('success', 'Book Succesfully Deleted');

        return redirect()->route('books.display');
    }
    public function render()
    {
        return view('livewire.buttons.delete-book');
    }
}
