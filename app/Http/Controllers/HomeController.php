<?php

namespace App\Http\Controllers;

use App\Models\borrow;
use DateTime;
use App\Models\Post;
use App\Models\Reversion;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use DatePeriod;
class HomeController extends Controller
{
    public function index()
    {
        /*
        $lastposts = Post::where('featured', '1')
                        ->latest()
                        ->take(3)
                        ->get();
        */
        return view('home.index');
    }

    public function AppointmentPage($borrow)
    {
       $borrowdetails = borrow::find($borrow);

        return view('home.AppointmentPage',['borrowdetails'=>$borrowdetails]);

    }

}
