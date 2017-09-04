<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', ['products' => \App\Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);

        $path = $request->file('image')->storeAs('image', time().'.'.$request->file('image')->getClientOriginalExtension());
        
        \App\Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path
        ]);

        $request->session()->flash('success', 'Product has been create successfuly');

        return redirect()->route('products.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit', ['product' => \App\Product::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = \App\Product::find($id);

        if($request->hasFile('image')){
            $path = $request->file('image')->storeAs('image', time().'.'.$request->file('image')->getClientOriginalExtension());
        }else{
            $path = $product->image;
        }

        $product->name = $request->name;
        $product->image = $path;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        $request->session()->flash('success', 'The product has been updated');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = \App\Product::find($id);
        Storage::delete($product->image);
        $product->delete();
        session()->flash('success', 'Product has been removed successfuly');
        return redirect()->route('products.index');
    }
}
