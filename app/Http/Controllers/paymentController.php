<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reversion;
use Session;
use Stripe;
class paymentController extends Controller
{
    //
    public function fine()
    {
        return view('StudentDashboard.payments.index');
    }
    public function paid()
    {
        return view('StudentDashboard.payments.paid');
    }
    public function payment(Reversion $unpaid)
    {
        return view('StudentDashboard.payments.payment',['unpaid'=>$unpaid]);
    }

  
   public function stripePost(Request $request)
   {
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from tutsmake.com."
        ]);

        Session::flash('success', 'Payment successful!');
        
        return back();
     
   }
    
}
