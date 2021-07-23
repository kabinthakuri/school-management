<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function ViewGroup(){
        $data['allData']=StudentGroup::all();
        return view('backend.setup.group.view_group',$data);
    }
    public function AddGroup(){
        return view('backend.setup.group.add_group');
    }
    public function StoreGroup(Request $request){
        $request->validate([
            'name'=>'required|unique:student_groups,name'
        ]);
        StudentGroup::create([
            'name'=>$request->name
        ]);
        return redirect()->route('student.group.view')->with('message','Student Group Created successfully.');
    }
    public function EditGroup($id){
        $group=StudentGroup::find($id);
        return view('backend.setup.group.edit_group',compact('group'));
    }
    public function UpdateGroup(Request $request,$id){
        $group=StudentGroup::find($id);
        $request->validate([
            'name'=>'required|unique:student_groups,name,'.$group->id
        ]);
        $group->update([
            'name'=>$request->name
        ]);
        return redirect()->route('student.group.view')->with('info','Student Group updated successfully.');

    }
    public function DeleteGroup($id){
        $group=StudentGroup::find($id);
        $group->delete();
        return redirect()->route('student.group.view')->with('info','Student Group deleted successfully.');

    }
}
