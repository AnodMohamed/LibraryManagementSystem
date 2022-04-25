<?php

namespace App\Http\Livewire\Audiobooks;

use App\Models\Audiobook;
use Facade\FlareClient\Stacktrace\File;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;

    public $orderBy = 'id';
    public $perPage  = 10;
    public $orderAsc = true;

    public function download($id)
    {
        $audiobook =Audiobook::find($id);
        return response()->download(storage_path('app/audio/'. $audiobook->audio));
    }

    public function render()
    {
        return view('livewire.audiobooks.index', [
            'audiobooks' => Audiobook::where('bookspeaker',Auth::user()->id)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }
}
