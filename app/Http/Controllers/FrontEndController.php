<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
    	return view('index', ['products' => \App\Product::paginate(3)]);
    }

    public function single($id)
    {
    	return view('single', ['product' => \App\Product::find($id)]);
    }
}
