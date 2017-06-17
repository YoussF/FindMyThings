<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Image;
use Illuminate\Support\Facades\Input;
use Session;

class SettingsController extends Controller
{

    public function edit()
    {
        $user = Auth::user();
        return view('design.home.settings', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
            $user->name = $request->input('firstname') . ' ' . $request->input('lastname');
            $user->firstname = strip_tags($request->input('firstname'));
            $user->lastname = strip_tags($request->input('lastname'));
            $user->email = strip_tags($request->input('email'));
            $user->gender = strip_tags($request->input('gender'));
            $user->phone = strip_tags($request->input('phone'));

            if($request->input('password') != null){
                $user->password = bcrypt($request->input('password'));
            }
            //avatar
            if ($request->file('avatar')) {
                // Upload new groups logo
                $destination = public_path() . '/uploads/avatar/' ;
                if (!file_exists($destination)) mkdir($destination, 0777, true);
                
                $extension = $request->file('avatar')->getClientOriginalExtension();

                $user->avatar = $user->id;
                $name = $user->avatar . '.' .$extension;
                $user->avatar = $name;
                Image::make($request->file('avatar'))->save($destination.$name);
            }     
        $user->save();
        return redirect('/')->with('status', 'Profile updated!');     
    }

}
