<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function ViewShift(){
        $data['allData']=StudentShift::all();
        return view('backend.setup.shift.view_shift',$data);
    }
    public function AddShift(){
        return view('backend.setup.shift.add_shift');
    }
    public function StoreShift(Request $request){
        $request->validate([
            'name'=>'required|unique:student_shifts,name'
        ]);
        StudentShift::create([
            'name'=>$request->name
        ]);
        return redirect()->route('student.shift.view')->with('message','Student Shift Created successfully.');
    }
    public function EditShift($id){
        $shift=StudentShift::find($id);
        return view('backend.setup.shift.edit_shift',compact('shift'));
    }
    public function UpdateShift(Request $request,$id){
        $shift=StudentShift::find($id);
        $request->validate([
            'name'=>'required|unique:student_shifts,name,'.$shift->id
        ]);
        $shift->update([
            'name'=>$request->name
        ]);
        return redirect()->route('student.shift.view')->with('info','Student Shift updated successfully.');

    }
    public function DeleteShift($id){
        $shift=StudentShift::find($id);
        $shift->delete();
        return redirect()->route('student.shift.view')->with('info','Student Shift deleted successfully.');

    }
}
