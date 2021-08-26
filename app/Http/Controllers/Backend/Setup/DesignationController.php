<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function ViewDesignation(){
        $data['allData']=Designation::all();
        return view('backend.setup.designation.view_designation',$data);
    }
    public function AddDesignation(){
        return view('backend.setup.designation.add_designation');
    }
    public function StoreDesignation(Request $request){
        $request->validate([
            'name'=>'required|unique:designations,name'
        ]);
        Designation::create([
            'name'=>$request->name
        ]);
        return redirect()->route('designation.view')->with('message',' Designation Created successfully.');
    }
    public function EditDesignation($id){
        $designation=Designation::find($id);
        return view('backend.setup.designation.edit_designation',compact('designation'));
    }
    public function UpdateDesignation(Request $request,$id){
        $designation=Designation::find($id);
        $request->validate([
            'name'=>'required|unique:designations,name,'.$designation->id
        ]);
        $designation->update([
            'name'=>$request->name
        ]);
        return redirect()->route('designation.view')->with('info','Designation updated successfully.');

    }
    public function DeleteDesignation($id){
        $designation=Designation::find($id);
        $designation->delete();
        return redirect()->route('designation.view')->with('info','Designation deleted successfully.');

    }
}
