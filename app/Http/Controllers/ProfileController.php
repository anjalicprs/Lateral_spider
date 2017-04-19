<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    //
    public function profile($username)
    {
    	$user=User::whereUsername($username)->first();
    	return view('user.profile',compact('user'));
    }
   /* public function update_avatar(Request $request){
    	// Handle the user upload of avatar
    	if($request->hasFile('Picture')){
    		$avatar = $request->file('Picture');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		$user = Auth::user();
    		$user->Picture = $filename;
    		$user->save();
    	}
    	return view('profile', array('user' => Auth::user()) );
    }*/
}
