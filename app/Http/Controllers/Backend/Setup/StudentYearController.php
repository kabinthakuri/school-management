<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function ViewYear(){
        $data['allData']=StudentYear::all();
        return view('backend.setup.year.view_year',$data);
    }
    public function AddYear(){
        return view('backend.setup.year.add_year');
    }
    public function StoreYear(Request $request){
        $request->validate([
            'name'=>'required|unique:student_years,name'
        ]);
        StudentYear::create([
            'name'=>$request->name
        ]);
        return redirect()->route('student.year.view')->with('message','Student Year Created successfully.');
    }
    public function EditYear($id){
        $year=StudentYear::find($id);
        return view('backend.setup.year.edit_year',compact('year'));
    }
    public function UpdateYear(Request $request,$id){
        $year=StudentYear::find($id);
        $request->validate([
            'name'=>'required|unique:student_years,name,'.$year->id
        ]);
        $year->update([
            'name'=>$request->name
        ]);
        return redirect()->route('student.year.view')->with('info','Student Year updated successfully.');

    }
    public function DeleteYear($id){
        $year=StudentYear::find($id);
        $year->delete();
        return redirect()->route('student.year.view')->with('info','Student Year deleted successfully.');

    }
}
