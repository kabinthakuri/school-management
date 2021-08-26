<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView(){
          $data['allData'] = User::where('usertype','admin')->get();
          return view('backend.user.view_user',$data);
    }
    public function UserAdd(){
        return view('backend.user.add_user'); 
    }
    public function UserStore(Request $request ){
        $request->validate([
            'email'=>'required|unique:users',
            
        ]);
        // $data = new User();
        // $data->name=$request->name;
        // $data->usertype=$request->usertype;
        // $data->email=$request->email;
        // $data->password=bcrypt($request->password);
        // $data->save();
        $code = rand(0000,9999);
        User::create([
            'name'=>$request->name,
            'usertype'=>'admin',
            'role'=>$request->role,
            'email'=>$request->email,
            'password'=>bcrypt($code),
            'code'=>$code
        ]);
        return redirect()->route('user.view')->with('message','User added successfully.');
    }
    public function UserEdit($id){
        $useredit=User::find($id);
        return view('backend.user.edit_user',compact('useredit'));
    }
    public function UserUpdate(Request $request,$id){
        $data = User::find($id);
        $data->update([
            'name'=>$request->name,
            'role'=>$request->role,
            'email'=>$request->email
        ]);
        return redirect()->route('user.view')->with('info','User updated successfully.');
    }
    public function UserDelete($id){
        $data=User::find($id);
        $data->delete();
        return redirect()->route('user.view')->with('info','User deleted successfully.');
    }
}
