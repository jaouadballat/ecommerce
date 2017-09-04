<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Mail\ShippedSuccess;
use Mail;

class CheckoutController extends Controller
{
    public function index()
    {
    	return view('checkout');
    }

    public function pay()
    {
    	//dd(request()->all());

    	\Stripe\Stripe::setApiKey("sk_test_bSlBjwlbWBzNzmRUXsbhFaVY");
    	$charge = \Stripe\Charge::create(array(
		  "amount" => Cart::total() * 100,
		  "currency" => "usd",
		  "description" => "We have payed your charges",
		  "source" => request()->stripeToken,
		));

    	Cart::destroy();
		request()->session()->flash('success', 'your item has been payed successfuly');
		Mail::to(request()->stripeEmail)->send(new ShippedSuccess());
		return redirect()->route('index');


    }
}
