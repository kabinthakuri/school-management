<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function ViewStudent(){
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class',$data);
    }
    public function AddStudent(){
        return view('backend.setup.student_class.add_class');
    }
    public function StoreStudent(Request $request){
        $request->validate([
            'name'=>'required|unique:student_classes,name'
        ]);
        StudentClass::create([
            'name'=>$request->name
        ]);
        return redirect()->route('student.class.view')->with('message','Student class inserted successfully.');
    }
    public function EditStudent($id){
        $class=StudentClass::find($id);
        return view('backend.setup.student_class.edit_class',compact('class'));
    }
    public function UpdateStudent(Request $request,$id){
        $class=StudentClass::find($id);
        $request->validate([
            'name'=>'required|unique:student_classes,name,'.$class->id
        ]);
        
        $class->update([
            'name'=>$request->name
        ]);
        return redirect()->route('student.class.view')->with('info','Student class updated successfully.');
    }
    public function DeleteStudent($id){
        $class=StudentClass::find($id);
        $class->delete();
        return redirect()->route('student.class.view')->with('info','Student class deleted successfully.');
    }
}
