<?php

namespace App\Http\Controllers\FDFAdmin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notifications;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\DetailOrder;
use App\Notifications\AcceptOrder;
use App\Notifications\RejectOrder;
use Mail;

class ManagingOrder extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderList = Order::select('orders.*', 'users.name as fullname', 'address', 'email')->join('users', 'orders.user_id', '=', 'users.id')->whereIN('status', [config('setting.not_progress'), config('setting.in_delivery')])->get();

        return view('fdfadmin.order.index', compact('orderList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orderList = Order::select('orders.*', 'users.name as fullname', 'address', 'email')->join('users', 'orders.user_id', '=', 'users.id')->whereNotIn('status', [config('setting.not_progress'), config('setting.in_delivery')])->get();

        return view('fdfadmin.order.index', compact('orderList'));
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
        $userInfo = User::join('orders', 'orders.user_id', '=', 'users.id')
            ->where('orders.id', $id)
            ->first();

        $productInfor = Product::join('detail_orders', 'products.id', '=', 'detail_orders.product_id')
            ->where('detail_orders.order_id', $id)
            ->get();

        $getOrderId = Order::find($id); 

        return view('fdfadmin.order.detail', compact('userInfo', 'productInfor', 'getOrderId'));
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
        $order = Order::find($id);
        if ($order != null)
        {
            $getUserId = $order->user_id;
            $order->status = $request->txtStatus;
            $order->save();
            
            if($order->status == trans('order.in_delivery'))
            {
                $notyOrder = User::join('orders', 'orders.user_id', '=', 'users.id')->where('status', '=', config('setting.in_delivery'))->where('orders.user_id', '=', $getUserId)->first();
                \Notification::send($notyOrder, new AcceptOrder($order));
            }

            if($order->status == trans('order.reject'))
            {
                $rejectOrder = User::join('orders', 'orders.user_id', '=', 'users.id')->where('status', '=', config('setting.reject_order'))->where('orders.user_id', '=', $getUserId)->first();
                \Notification::send($rejectOrder, new RejectOrder($order));
            }    

            return redirect(route('managing-order.index'))->with('alert',trans('order.status_done'));            
        } else {

            return redirect(route('managing-order.index'))->with('alert',trans('order.status_done'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order != null)
        {
            $order->delete();
            return redirect(route('managing-order.index'))->with('alert',trans('order.delete_done'));
        }
        else {
            return redirect(route('managing-order.index'))->with('alert',trans('order.delete_fail'));
        }
    }
}
