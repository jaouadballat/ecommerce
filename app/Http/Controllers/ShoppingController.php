<?php

namespace App\Http\Controllers;
use Cart;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function add_to_cart()
    {

    	//Cart::destroy();
		//dd(Cart::content());
    	$product = \App\Product::find(request()->product_id);
    	 Cart::add([
    		'id' => request()->product_id,
    		'name' => $product->name,
    		'price' => $product->price,
    		'qty' => request()->Qty
    	])->associate('App\Product');


    	return redirect()->route('cart');
    }

    public function cart()
    {
    	return view('cart');
    }

    public function delete($id)
    {
    	Cart::remove($id);
    	return redirect()->back();
    }

    public function inc($id)
    {
        Cart::update($id, ['qty' => Cart::get($id)->qty + 1]);
    	return redirect()->back();
    }

    public function dec($id)
    {
        Cart::update($id, ['qty' => Cart::get($id)->qty - 1]);
        return redirect()->back();
    }

    public function add_rapid($id)
    {
        $product = \App\Product::find($id);
         Cart::add([
            'id' => $id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => 1
        ])->associate('App\Product');

        return redirect()->back();
        
    }
}
