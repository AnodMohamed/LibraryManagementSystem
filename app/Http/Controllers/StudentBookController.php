<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentBookController extends Controller
{
    //
    public function index()
    {
        return view('StudentDashboard.books.index');

    }


    public function create()
    {
        /*
        return view('AdminDashboard.books.create', [
            'categories'    => Category::all(),
        ]);
        */
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store()
    {
       
    }

    public function edit(Book $book )
    {

    }


    public function update()
    {
       
    }

}
