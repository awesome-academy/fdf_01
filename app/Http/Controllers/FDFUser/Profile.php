<?php

namespace App\Http\Controllers\FDFUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use App\Models\User;
use App\Models\History;
use App\Models\Order;

class Profile extends Controller
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
        //
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
        $user = User::find($id);
        $orders = Order:: select('histories.id as id', 'histories.created_at as date', 'histories.user_id', 'histories.order_id',
            'products.name as name_product', 'products.avatar as image_product', 'orders.status', 'products.quantity as qty')
            ->join('histories', 'orders.id', '=', 'histories.order_id')
            ->join('users', 'histories.user_id', '=', 'users.id')
            ->join('detail_orders', 'detail_orders.order_id', '=', 'orders.id')
            ->join('products', 'detail_orders.product_id', '=', 'products.id')
            ->where('histories.user_id', $id)
            ->where('orders.status', '=', '1')
            ->get();

        return view('fdfuser.profile.index', compact('user', 'orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->password = bcrypt($request->txtPassword);
        $user->name = $request->txtName;
        $user->phone_number = $request->txtPhone;
        $user->role = @config('setting.user');
        $user->gender = $request->txtGender;
        $user->address = $request->txtAddress;

        if($request -> hasFile('image'))
        {
            $file = $request -> file('image');

            $after_image = $file -> getClientOriginalExtension();
            if($after_image != 'jpg' && $after_image != 'png' && $after_image != 'jepg')
            {
                return redirect(route('profile.show', Auth() -> user() ->id))->with('alert', trans('profile_page.upload_file'));
            }

            $name = $file -> getClientOriginalName();

            $image = str_random(4) ."_" .$name;

            while (file_exists("source/image/user/".$image))
            {

                $image = str_random(4) ."_" .$name;
            }
            $file -> move("source/image/user/", $image);

            $user -> avatar = $image;
        }

        $checkSave = $user->save();

        if($checkSave)
        {
            return redirect(route('profile.show', Auth() -> user() ->id))->with('alert', trans('profile_page.update_success'));
        }
        else
        {
            return redirect(route('profile.show', Auth() -> user() ->id))->with('alert', trans('profile_page.update_fail'));
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
        //
    }
}
