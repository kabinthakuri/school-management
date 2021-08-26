<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;

class AssignSubjectController extends Controller
{
    public function ViewSubject(){
        $data['allData']=AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign.view_assign',$data);
    }
    public function AddSubject(){
        $data['subjects']=SchoolSubject::all();
        $data['classes']=StudentClass::all();
        return view('backend.setup.assign.add_assign',$data);
    }
    public function StoreSubject(Request $request){
        $countsubject=count($request->subject_id);
        if($countsubject !=NULL){
            for($i=0;$i<$countsubject;$i++){
                AssignSubject::create([
                    'class_id'=>$request->class_id,
                    'subject_id'=>$request->subject_id[$i],
                    'full_mark'=>$request->full_mark[$i],
                    'pass_mark'=>$request->pass_mark[$i],
                    'subjective_mark'=>$request->subjective_mark[$i]
                    
                ]);
            }

        }
        return redirect()->route('assign.subject.view')->with('message','Fee amount inserted successfully.');
        
    }
    public function EditSubject($class_id)
    {
        $data['editData']=AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        $data['subjects']=SchoolSubject::all();
        $data['classes']=StudentClass::all();
        return view('backend.setup.assign.edit_assign',$data);
    }
    public function UpdateSubject(Request $request, $class_id){
        if($request->subject_id == NULL){
            return redirect()->route('assign.subject.edit',$class_id)->with('error',"Sorry, You don't select any subject." );
        }else{
            AssignSubject::where('class_id',$class_id)->delete();
            $countsubject=count($request->subject_id);
            
                for($i=0;$i<$countsubject;$i++){
                    AssignSubject::create([
                        'class_id'=>$request->class_id,
                        'subject_id'=>$request->subject_id[$i],
                        'full_mark'=>$request->full_mark[$i],
                        'pass_mark'=>$request->pass_mark[$i],
                        'subjective_mark'=>$request->subjective_mark[$i]
                        
                    ]);
                }
    
            
        }
        return redirect()->route('assign.subject.view')->with('info','subject assignment updated successfully.');
    }
    public function DetailSubject($class_id){
        $data['detailsData']=AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        return view('backend.setup.assign.details_assign',$data);
    }
}
