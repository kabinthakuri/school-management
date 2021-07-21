<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView(){
        $id=Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.view_profile',compact('user'));
    }
    public function ProfileEdit(){
        $id=Auth::user()->id;
        $editData = User::find($id);
        return view('backend.user.edit_profile',compact('editData'));
    }
    public function ProfileStore(Request $request){
        
        $userdata = User::find(Auth::user()->id);
        $userdata->name=$request->name;
        $userdata->email=$request->email;
        $userdata->mobile=$request->mobile;
        $userdata->address=$request->address;
        $userdata->gender=$request->gender;
        $userdata->image = $request->file('image')->store('public/upload/user_images');
        // if($request->file('image')){
        //     $file=$request->file('image');
        //     @unlink(public_path('upload/user_images/'.$userdata->image));
        //     $filename = date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/user_images'),$filename);
        //     $userdata['image']=$filename;
        // }
        $userdata->save();
       
            return redirect()->route('profile.view')->with('message','Profile updated successfully.');
    }
    public function PasswordView(){
        return view('backend.user.view_password');
    }
    public function PasswordUpdate(Request $request){
        $request->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed',
        ]);
        $hashpassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashpassword)){
            $user=User::find(Auth::user()->id);
            $user->update([
                'password'=>Hash::make($request->password)
            ]);
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }
    }
}
