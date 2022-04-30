<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reversion;
use App\Models\Transaction;
use Exception;
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
        return view('StudentDashboard.payments.payment', ['unpaid' => $unpaid]);
    }

    public function stripePost(Request $request)
    {
        //add STRIPE_SECRET 
        $stripe = new  \Stripe\StripeClient(env('STRIPE_SECRET'));


        //add customer detials
        $customer = $stripe->customers->create([
            'source' => 'tok_mastercard',
            "email" => auth()->user()->email,
        ]);

        try {
            //add card detials
            $stripe->tokens->create([

                'card' => [
                'name'=>$request->card_name,
                'number' => $request->get('card_number'),
                'exp_month' => $request->get('exp_month'),
                'exp_year' => $request->get('exp_year'),
                'cvc' => $request->get('card_cvc'),
                ],

            ]);

            //send data to stripe
           $intent =  $stripe->paymentIntents->create([
                'amount'=> $request->amount.'00',
                'currency' => 'usd',
                'payment_method_types' => ['card'],
                'payment_method' => 'pm_card_visa',
                'customer'=> $customer,
                'confirm' => true,
            ]);

            // check if status is success
        $paymentStatus = json_decode($this->generateResponse($intent),true);
        if ($paymentStatus['success'] === true) {
            if ($customer) {
                //add Transaction detials to database
                Transaction::create([
                    'reversion_id'=> $request->reversion_id,
                    'amount'=>$request->amount,
                    'currency'=> 'usd',
                    'status'=> 'payed',
                    'transaction_id'=> $customer->id
                ]);
            }

            return redirect()->route('payments.paid')->with('success', 'Payment successful!');

        }

        }catch(Exception $ex) {
            echo $ex->getMessage();
        }


    }

    public function generateResponse($intent) {
        if ($intent->status == 'succeeded') {
          // Handle post-payment fulfillment
          return json_encode(['success' => true]);
        } else {
          // Any other status would be unexpected, so error
          return json_encode(['error' => 'Invalid PaymentIntent status']);
        }
      }
}
