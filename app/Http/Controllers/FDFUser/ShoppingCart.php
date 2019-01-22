<?php

namespace App\Http\Controllers\FDFUser;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notifications;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\DetailOrder;
use App\Models\User;
use App\Notifications\ReceiveOrder;
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
        $cartInfor = Cart::content();
        if (count($cartInfor) == config('setting.default'))
        {
            return redirect(route('cart.create'))->with('alert',trans('cart.no_cart'));
        } else {
            try {
                if(auth()->check())
                {
                    $idUser = auth()->user()->id;
                    $order = new Order;
                    $order->user_id = $idUser;
                    $order->date_order = date('Y-m-d H:i:s');
                    $order->note = $request->txtNote;
                    $order->status = config('setting.not_progress');
                    $order->total_payment = str_replace(',', '', Cart::subtotal());
                    $order->save();
                    if (count($cartInfor) > config('setting.default')) {
                        foreach ($cartInfor as $key => $item) {
                            $detailOrder = new DetailOrder;
                            $detailOrder->order_id = $order->id;
                            $detailOrder->product_id = $item->id;
                            $detailOrder->amount = $item->qty;
                            $detailOrder->price = $item->price * $item->qty;
                            $detailOrder->save();
                        }
                    }
                    Cart::destroy();
                }
                $notyAdmin = User::where('role', '=', config('setting.admin'))->get();
                \Notification::send($notyAdmin, new ReceiveOrder());

                return redirect(route('cart.create'))->with('alert',trans('cart.checkout_success'));
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
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
