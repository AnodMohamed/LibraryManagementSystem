<?php

namespace App\Http\Controllers;

use App\Models\borrow;
use Illuminate\Http\Request;

class BorrowsController extends Controller
{
    //
    public function pending()
    {

        return view('AdminDashboard.borrows.Pending-borrowing-requests');
        
    }

    public function acceptable()
    {

        return view('AdminDashboard.borrows.acceptable-borrowing-requests');
        
    }

    public function studentIndex()
    {

        return view('StudentDashboard.borrows.index');
        
    }
    
}
