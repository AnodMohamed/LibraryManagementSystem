<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAudiobooksRequest;
use App\Models\Audiobook;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AudiobookController extends Controller
{
    //
    public function index()
    {
        return view('StudentDashboard.audiobooks.index');

    }
    public function adminIndex()
    {
        return view('AdminDashboard.audiobooks.index');

    }
    public function create()
    {
        return view('StudentDashboard.audiobooks.create', [
            'books'    => Book::where('featured','1')->get(),
        ]);
    }

    public function store(StoreAudiobooksRequest $request)
    {
        $audiobook                        = new Audiobook();
        $audiobook->book_id               = $request->book_id;
        $audiobook->bookspeaker           = Auth::user()->id;

        if ($request->hasFile('audio')) {
            $audio          = $request->file('audio');
            $audioName      = $audio->getClientOriginalName();
            $audioNewName   = explode('.', $audioName)[0];
            $fileExtention  = time() . '.' . $audioNewName . '.' . $audio->getClientOriginalExtension();
            $audio->storeAs('audio', $fileExtention);
            $audiobook->audio = $fileExtention;
        };
        $audiobook->save();

        return redirect()->route('audiobooks.index')->with('success', 'Audio created succesfully!');
   
    }
}
