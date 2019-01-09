<?php

namespace App\Http\Controllers\FDFAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\ManagingUserRequest;
use App\Http\Requests\EditUserRequest;

class ManagingUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userList = User::where('role', config('setting.user'))->get();

        return view('fdfadmin.user.index', compact('userList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('fdfadmin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagingUserRequest $request)
    {
        $user = new User;
        $user->name = $request->txtName;
        $user->email = $request->email;
        $user->password = bcrypt($request->txtPassword);
        $user->phone_number = $request->txtPhone;
        $user->role = $request->txtRole;
        $user->gender = $request->txtGender;
        $user->address = $request->txtAddress;
        $user->avatar = "default.jpeg";
        $checkSave = $user->save();
        if($checkSave)
        {
            return redirect(route('managing-user.index'))->with('alert', trans('managing_user.add_success'));
        } else {

            return redirect(route('managing-user.index'))->with('alert', trans('managing_user.add_failed'));
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userList = User::findOrFail($id);

        return view('fdfadmin.user.edit', compact('userList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->password = bcrypt($request->txtPassword);
        $user->name = $request->txtName;
        $user->phone_number = $request->txtPhone;
        $user->role = $request->txtRole;
        $user->gender = $request->txtGender;
        $user->address = $request->txtAddress;
        $checkSave = $user->save();
        if($checkSave)
        {

            return redirect(route('managing-user.index'))->with('alert', trans('managing_user.edit_success'));
        } else {

            return redirect(route('managing-user.index'))->with('alert', trans('managing_user.edit_failed'));
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
        try {
            $userDel = User::findOrFail($id);
            $oldPicture = $userDel->avatar;
            if ($oldPicture != "default.jpeg")
            {
                $oldPath = public_path('images/user/avatar/').$oldPicture;
                unlink($oldPath);
            }
            $userDel->delete();

            return redirect()->route('managing-user.index')->with('msgDelete', trans('admin_page.delete_success'));
        } catch (Exception $exception) {

            return redirect()->route('managing-user.index')->with('msgDelete', trans('admin_pages.delete_failed'));
        }
    }
}
