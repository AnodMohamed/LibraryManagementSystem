<?php

namespace App\Http\Livewire\Buttons;

use App\Models\Audiobook;
use Livewire\Component;

class Audiobookfeatured extends Component
{
   
    public Audiobook $audiobook;
    public string $name;
    public bool $featured;

    public function mount()
    {
        $this->featured = $this->audiobook->getAttribute('featured');
    }

    public function render()
    {
        return view('livewire.buttons.audiobookfeatured');
    }

    public function updating($name, $value)
    {
        $this->audiobook->setAttribute($name, $value)->save();
    }
}
