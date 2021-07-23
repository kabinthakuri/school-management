<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function ViewFeeCat(){
        $data['allData']=FeeCategory::all();
        return view('backend.setup.feecat.view_feecat',$data);
    }
    public function AddFeeCat(){
        return view('backend.setup.feecat.add_feecat');
    }
    public function StoreFeeCat(Request $request){
        $request->validate([
            'name'=>'required|unique:fee_categories,name'
        ]);
        FeeCategory::create([
            'name'=>$request->name
        ]);
        return redirect()->route('fee.category.view')->with('message','Fee Category Created successfully.');
    }
    public function EditFeeCat($id){
        $feecat=FeeCategory::find($id);
        return view('backend.setup.feecat.edit_feecat',compact('feecat'));
    }
    public function UpdateFeeCat(Request $request,$id){
        $feecat=FeeCategory::find($id);
        $request->validate([
            'name'=>'required|unique:fee_categories,name,'.$feecat->id
        ]);
        $feecat->update([
            'name'=>$request->name
        ]);
        return redirect()->route('fee.category.view')->with('info','Fee Category updated successfully.');

    }
    public function DeleteFeeCat($id){
        $feecat=FeeCategory::find($id);
        $feecat->delete();
        return redirect()->route('fee.category.view')->with('info','Fee Category deleted successfully.');

    }
}
