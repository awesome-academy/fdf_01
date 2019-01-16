<?php

namespace App\Http\Controllers\FDFUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;

class ShoppingCart extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view('fdfuser.cart.cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if ($product != null) 
        {
            $cartInfo = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => config('setting.quantity'),
            ];
            $cartNew = Cart::add($cartInfo);
            $rowId = $cartNew->rowId;
            Cart::remove($rowId);            
        } else {

            return redirect()->back()->with('alert', trans('home_page.fail'));
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $product = Product::find($id);
        if ($product != null)
        {
            $cartInfo = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => config('setting.quantity'),
            ];
            Cart::add($cartInfo);
        } else {
            
            return redirect()->back()->with('alert', trans('home_page.fail'));
        }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
