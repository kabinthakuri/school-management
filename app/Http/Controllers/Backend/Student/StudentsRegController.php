<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use DB;
class StudentsRegController extends Controller
{
    public function ViewRegistration(){
        $data['year']=StudentYear::all();
        $data['class']=StudentClass::all();
        $data['year_id']=StudentYear::orderBy('id','desc')->first()->id;
        $data['class_id']=StudentClass::orderBy('id','desc')->first()->id;
        $data['allData']= AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
        return view('backend.student.student_reg.student_view',$data);
    }
    public function AddRegistration(){
        $data['year']=StudentYear::all();
        $data['class']=StudentClass::all();
        $data['group']=StudentGroup::all();
        $data['shift']=StudentShift::all();
        return view('backend.student.student_reg.student_add',$data);
    }
    public function StoreRegistration(Request $request){
        DB::transaction(function()use($request){
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype','student')->orderBy('id','DESC')->first();
            if($student == null){
                $firstReg = 0;
                $studentid = $firstReg+1;
                if($studentid <10){
                    $id_no = '000'.$studentid;
                }elseif($studentid <100){
                    $id_no = '00'.$studentid;
                }elseif($studentid <1000){
                    $id_no ='0'.$studentid;
                }
            }else{
                $student = User::where('usertype','student')->orderBy('id','DESC')->first()->id;
                $studentid= $student+1;
                if($studentid <10){
                    $id_no = '000'.$studentid;
                }elseif($studentid <100){
                    $id_no = '00'.$studentid;
                }elseif($studentid <1000){
                    $id_no ='0'.$studentid;
                }
            }
            $final_id_no=$checkYear.$id_no;
            $code = rand(0000,9999);
            $user = new User();
            $user->id_no=$final_id_no;
            $user->password=bcrypt('$code');
            $user->usertype='student';
            $user->code=$code;
            $user->name=$request->name;
            $user->fname=$request->fname;
            $user->mname=$request->mname;
            $user->mobile=$request->mobile;
            $user->address=$request->address;
            $user->gender=$request->gender;
            $user->religion=$request->religion;
            $user->dob=date('Y-m-d',strtotime($request->dob));
            $user->image=$request->file('image')->store('public/upload/student_images');
            $user->save();

            
            $assign_student= new AssignStudent();
            $assign_student->student_id=$user->id;
            $assign_student->year_id=$request->year_id;
            $assign_student->class_id=$request->class_id;
            $assign_student->group_id=$request->group_id;
            $assign_student->shift_id=$request->shift_id;
            $assign_student->save();
            DiscountStudent::create([
                'assign_student_id'=>$assign_student->id,
                'fee_category_id'=>'1',
                'discount'=>$request->discount
            ]);

        });
        return redirect()->route('registration.view')->with('message','Student Registration inserted successfully.');
    }
    public function SearchRegistration(Request $request){
        $data['year']=StudentYear::all();
        $data['class']=StudentClass::all();
        $data['year_id']=$request->year_id;
        $data['class_id']=$request->class_id;
        $data['allData']= AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        return view('backend.student.student_reg.student_view',$data);
    }
    public function EditRegistration($student_id){
        $data['year']=StudentYear::all();
        $data['class']=StudentClass::all();
        $data['group']=StudentGroup::all();
        $data['shift']=StudentShift::all();
        $data['editData']=AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        return view('backend.student.student_reg.student_edit',$data);
    }
    public function UpdateRegistration(Request $request, $student_id){
       
        $user = User::find($student_id);
        $user->name=$request->name;
        $user->fname=$request->fname;
        $user->mname=$request->mname;
        $user->mobile=$request->mobile;
        $user->address=$request->address;
        $user->gender=$request->gender;
        $user->religion=$request->religion;
        $user->dob=date('Y-m-d',strtotime($request->dob));
        if($request->image){
            Storage::delete($user->image);
            $user->image=$request->file('image')->store('public/upload/student_images');
        }
       
        $user->save();

        
        $assign_student= AssignStudent::where('student_id',$student_id)->first();
        
        $assign_student->year_id=$request->year_id;
        $assign_student->class_id=$request->class_id;
        $assign_student->group_id=$request->group_id;
        $assign_student->shift_id=$request->shift_id;
        $assign_student->save();
        $discount = DiscountStudent::where('assign_student_id',$assign_student->id)->first();
        $discount->update([
            'discount'=>$request->discount
        ]);

   
    return redirect()->route('registration.view')->with('info','Student Registration updated successfully.');
    }
    public function PromoteRegistration($student_id){
        $data['year']=StudentYear::all();
        $data['class']=StudentClass::all();
        $data['group']=StudentGroup::all();
        $data['shift']=StudentShift::all();
        $data['editData']=AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        return view('backend.student.student_reg.student_promote',$data);
    }
    public function PromoteUpdateRegistration(Request $request, $student_id){
        
        $user = User::find($student_id);
        $user->name=$request->name;
        $user->fname=$request->fname;
        $user->mname=$request->mname;
        $user->mobile=$request->mobile;
        $user->address=$request->address;
        $user->gender=$request->gender;
        $user->religion=$request->religion;
        $user->dob=date('Y-m-d',strtotime($request->dob));
        if($request->image){
            Storage::delete($user->image);
            $user->image=$request->file('image')->store('public/upload/student_images');
        }
       
        $user->save();

        $assign_student= new AssignStudent();
        $assign_student->student_id=$student_id;
        $assign_student->year_id=$request->year_id;
        $assign_student->class_id=$request->class_id;
        $assign_student->group_id=$request->group_id;
        $assign_student->shift_id=$request->shift_id;
        $assign_student->save();
        DiscountStudent::create([
            'assign_student_id'=>$assign_student->id,
            'fee_category_id'=>'1',
            'discount'=>$request->discount
        ]);

   
    return redirect()->route('registration.view')->with('info','Student Promotion updated successfully.');
    }
}
