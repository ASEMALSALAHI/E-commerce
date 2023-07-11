<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use function PHPUnit\Framework\isFalse;

class AdminController extends Controller
{
    //
    public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile()
    {
        $adminData =User::find(Auth::user()->id);
        return view('backend.admin.admin_profile',compact('adminData'));
    }

    public function UserProfileStore(Request $request)
    {
        $data=User::find(Auth::user()->id);
        $data->name=$request->name;
        $data->email=$request->email;

        if($request->file('profile_photo_path')){
            $file=$request->file('profile_photo_path');
            $filename=date('YmdHi').$file->getClientOriginalName();

            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path']=$filename;
        }
        $data->save();
        return redirect()->route('user.profile');


    }
}
