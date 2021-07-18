<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView(){
          $data['allData'] = User::all();
          return view('backend.user.view_user',$data);
    }
    public function UserAdd(){
        return view('backend.user.add_user'); 
    }
    public function UserStore(Request $request ){
        $request->validate([
            'email'=>'required|unique:users',
            'password'=>'required'
        ]);
        // $data = new User();
        // $data->name=$request->name;
        // $data->usertype=$request->usertype;
        // $data->email=$request->email;
        // $data->password=bcrypt($request->password);
        // $data->save();
        User::create([
            'name'=>$request->name,
            'usertype'=>$request->usertype,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
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
            'usertype'=>$request->usertype,
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
