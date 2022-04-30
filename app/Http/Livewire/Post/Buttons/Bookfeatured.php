<?php

namespace App\Http\Livewire\Buttons;
use App\Models\Book;
use Livewire\Component;
class Bookfeatured extends Component
{
    public Book $book;
    public string $name;
    public bool $featured;

    public function mount()
    {
        $this->featured = $this->book->getAttribute('featured');
    }

    public function render()
    {
        return view('livewire.buttons.bookfeatured');
    }

    public function updating($name, $value)
    {
        $this->book->setAttribute($name, $value)->save();
    }
}
