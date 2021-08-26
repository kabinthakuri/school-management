<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;

class FeeAmountController extends Controller
{
    public function ViewFeeAmount(){
        //$data['allData']=FeeAmount::all();
        $data['allData']=FeeAmount::select('feecategory_id')->groupBy('feecategory_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount',$data);
        
    }
    public function AddFeeAmount(){
        $data['fee_categories']=FeeCategory::all();
        $data['classes']=StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount',$data);
    }
    public function StoreFeeAmount(Request $request){
        $countclass=count($request->class_id);
        if($countclass !=NULL){
            for($i=0;$i<$countclass;$i++){
                FeeAmount::create([
                    'feecategory_id'=>$request->feecategory_id,
                    'class_id'=>$request->class_id[$i],
                    'amount'=>$request->amount[$i]
                ]);
            }

        }
        return redirect()->route('fee.amount.view')->with('message','Fee amount inserted successfully.');
        
    }
    public function EditFeeAmount($feecategory_id){
        $data['editData']=FeeAmount::where('feecategory_id',$feecategory_id)->orderBy('class_id','asc')->get();
        $data['fee_categories']=FeeCategory::all();
        $data['classes']=StudentClass::all();
        return view('backend.setup.fee_amount.edit_fee_amount',$data);
    }
    public function UpdateFeeAmount(Request $request,$feecategory_id){
        if($request->class_id == NULL){
            return redirect()->route('fee.amount.edit',$feecategory_id)->with('error',"Sorry, You don't select any class." );
        }else{
            FeeAmount::where('feecategory_id',$feecategory_id)->delete();
            $countclass=count($request->class_id);
            
                for($i=0;$i<$countclass;$i++){
                    FeeAmount::create([
                        'feecategory_id'=>$request->feecategory_id,
                        'class_id'=>$request->class_id[$i],
                        'amount'=>$request->amount[$i]
                    ]);
                }
    
            
        }
        return redirect()->route('fee.amount.view')->with('info','Fee amount updated successfully.');
    } 
    public function DetailFeeAmount($feecategory_id){
        $data['detailsData']=FeeAmount::where('feecategory_id',$feecategory_id)->orderBy('class_id','asc')->get();
        return view('backend.setup.fee_amount.details_fee_amount',$data);
    }
}
