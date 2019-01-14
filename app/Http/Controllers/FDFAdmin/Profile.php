<?php

namespace App\Http\Controllers\FDFAdmin;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class Profile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminProfile = User::where('id', Auth::user()->id)->first();
        
        return view('fdfadmin.index.index', compact('adminProfile'));
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
    public function store(ProfileRequest $request)
    {
        $getId = Auth::user()->id;
        $user = User::findOrFail($getId);
        
        $picture = "";
        $old_avatar = Auth::user()->avatar;
        $oldPath = public_path('images/user/avatar/').$old_avatar;

        if($request->file('txtAvatar') != null)
        {
            if($old_avatar != "default.jpeg") {
                unlink($oldPath);
            }
            $file = $request->file('txtAvatar');
            $fileExtension = $file->getClientOriginalExtension();
            $picture = 'avatar-'.time().'.'.$fileExtension;
            $uploadPath = public_path('images/user/avatar/');
            $file->move($uploadPath, $picture);
        } else {
            $picture = $old_avatar;
        }

        $user->name = $request->txtName;
        $user->phone_number = $request->txtPhone;
        $user->gender = $request->txtGender;
        $user->address = $request->txtAddress;
        $user->avatar = $picture;
        $checkSave = $user->save();
        if($checkSave)
        {
            
            return redirect(route('admin.index'))->with('alert',trans('admin_profile.update_successful'));
        } else {

            return redirect(route('admin.index'))->with('alert',trans('admin_profile.update_successful'));
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
