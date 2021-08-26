<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;

class SchoolSubjectController extends Controller
{
    public function ViewSubject(){
        $data['allData']=SchoolSubject::all();
        return view('backend.setup.subject.view_subject',$data);
    }
    public function AddSubject(){
        return view('backend.setup.subject.add_subject');
    }
    public function StoreSubject(Request $request){
        $request->validate([
            'name'=>'required|unique:school_subjects,name'
        ]);
        SchoolSubject::create([
            'name'=>$request->name
        ]);
        return redirect()->route('school.subject.view')->with('message','School Subject Created successfully.');
    }
    public function EditSubject($id){
        $subject=SchoolSubject::find($id);
        return view('backend.setup.subject.edit_subject',compact('subject'));
    }
    public function UpdateSubject(Request $request,$id){
        $subject=SchoolSubject::find($id);
        $request->validate([
            'name'=>'required|unique:school_subjects,name,'.$subject->id
        ]);
        $subject->update([
            'name'=>$request->name
        ]);
        return redirect()->route('school.subject.view')->with('info','School Subject updated successfully.');

    }
    public function DeleteSubject($id){
        $subject=SchoolSubject::find($id);
        $subject->delete();
        return redirect()->route('school.subject.view')->with('info','School Subject deleted successfully.');

    }
}
