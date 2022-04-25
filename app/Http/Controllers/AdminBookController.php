<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class AdminBookController extends Controller
{
    public function index()
    {
        return view('AdminDashboard.books.index');

    }


    public function create()
    {
        return view('AdminDashboard.books.create', [
            'categories'    => Category::all(),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreBookRequest $request)
    {
        $book                             = new Book;
        $book->title                      = $request->title;
        $book->slug                       = Str::slug($request->title);
        $book->edition                    = $request->edition;
        $book->publisher                  = $request->publisher;
        $book->auther                     = $request->auther;
        $book->category_id                = $request->category_id;
        $book->bcopies                    = $request->bcopies;
        $book->bcopiesInwarehouse         = $request->bcopies;
        $book->published_at               = $request->published_at;

        if ($request->hasFile('cover_image')) {
            $image          = $request->file('cover_image');
            $imageName      = $image->getClientOriginalName();
            $imageNewName   = explode('.', $imageName)[0];
            $fileExtention  = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();
            $location       = $image->storeAs('book', $fileExtention);
            Image::make($image)->resize(1200, 630)->save($location);

            $book->cover_image = $fileExtention;
        };

        $book->save();

        return redirect()->route('books.display')->with('success', 'Book created succesfully!');
   
    }

    public function edit(Book $book )
    {
        $categories     = Category::all();
        return view('AdminDashboard.books.edit', compact('categories', 'book'));

    }


    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->title            = $request->title;
        $book->slug             = Str::slug($request->title);
        $book->edition          = $request->edition;
        $book->publisher        = $request->publisher;
        $book->auther            = $request->auther;
        $book->category_id      = $request->category_id;
        $book->bcopies          = $request->bcopies;
        $book->published_at     = $request->published_at;

        if ($request->hasFile('cover_image')) {
            //$oldFileName    = $book->cover_image;
            $image          = $request->file('cover_image');
            $imageName      = $image->getClientOriginalName();
            $imageNewName   = explode('.', $imageName)[0];
            $fileExtention  = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();
            $location       = $image->storeAs('book', $fileExtention);
            Image::make($image)->resize(1200, 630)->save($location);
            $book->cover_image = $fileExtention;
           // File::delete(asset('book/' . $oldFileName));

        };

        $book->save();

        return redirect()->route('books.display')->with('success', 'Book update succesfully!');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        
        return redirect()->route('books.display')->with('success', 'Book successfully deleted!');

    }
}
