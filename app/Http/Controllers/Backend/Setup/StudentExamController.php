<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentExam;

class StudentExamController extends Controller
{
    public function ViewExam(){
        $data['allData']=StudentExam::all();
        return view('backend.setup.exam.view_exam',$data);
    }
    public function AddExam(){
        return view('backend.setup.exam.add_exam');
    }
    public function StoreExam(Request $request){
        $request->validate([
            'name'=>'required|unique:student_exams,name'
        ]);
        StudentExam::create([
            'name'=>$request->name
        ]);
        return redirect()->route('student.exam.view')->with('message','Student Exam Created successfully.');
    }
    public function EditExam($id){
        $exam=StudentExam::find($id);
        return view('backend.setup.exam.edit_exam',compact('exam'));
    }
    public function UpdateExam(Request $request,$id){
        $exam=StudentExam::find($id);
        $request->validate([
            'name'=>'required|unique:student_exams,name,'.$exam->id
        ]);
        $exam->update([
            'name'=>$request->name
        ]);
        return redirect()->route('student.exam.view')->with('info','Student Exam updated successfully.');

    }
    public function DeleteExam($id){
        $exam=StudentExam::find($id);
        $exam->delete();
        return redirect()->route('student.exam.view')->with('info','Student Exam deleted successfully.');

    }
}
