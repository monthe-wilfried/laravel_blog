<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.index');
    }

    public function profile(){
        $user = Auth::user();
        return view('admin.profile.profile', compact('user'));
    }

    public function edit(){
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    public function update(ProfileRequest $request){

        $user = Auth::user();
        if (empty($request->password)){
            $input = $request->except('password');
        }
        else{
            $input = $request->all();
            $input['password'] = Hash::make($request->get('password'));
        }
        if ($file= $request->file('path')){
            $name = time().$file->getClientOriginalName();
            $file->move('img', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $user->update($input);
        return redirect()->back()->with('success', __('Profile updated with success.'));
    }

}
