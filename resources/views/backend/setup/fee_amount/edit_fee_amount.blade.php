@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="content-wrapper">
        <div class="container-full">
        <section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Edit Fee Category Amount</h4>
     
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
           <form action="{{route('fee.amount.update',$editData[0]->feecategory_id)}}" method="post">
               @csrf
               <div class="add_item">
        <div class="form-group">
        <h5>Fee Category <span class="text-danger">*</span></h5>
        <div class="controls">
            <select name="feecategory_id"  class="form-control">
                <option value="">Select Fee Category</option>
                @foreach($fee_categories as $feecat)
                <option value="{{$feecat->id}}" @if($editData[0]->feecategory_id == $feecat->id)selected @endif>{{$feecat->name}}</option>
                @endforeach
                
            </select>
        </div>
                </div>
            
            @foreach($editData as $edit)
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="row">
              <div class="col-5">
              <div class="form-group">
        <h5>Student Class <span class="text-danger">*</span></h5>
        <div class="controls">
            <select name="class_id[]"  class="form-control">
                <option value="">Select Class</option>
                @foreach($classes as $class)
                <option value="{{$class->id}}" @if($edit->class_id == $class->id)selected @endif>{{$class->name}}</option>
                @endforeach
                
            </select>
        </div>
                </div>
              </div>
              <div class="col-5">
              <div class="form-group">
            <h5>Student Fee Amount <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="amount[]" value="{{$edit->amount}}"  class="form-control" >
            </div>
            </div>
              </div>
              <div class="col-2" style="padding-top:25px;">
                <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
              </div>
            </div>
            @endforeach
            </div>
</div>

                  <input type="submit" class="btn btn-info btn-rounded mb-5" value="Update">
               
                  
                 
           </form>

       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

</section>
        </div>
    </div>
    <div style="visibility:hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
      <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
        <div class="form-row">
        <div class="col-5">
              <div class="form-group">
        <h5>Student Class <span class="text-danger">*</span></h5>
        <div class="controls">
            <select name="class_id[]"  class="form-control">
                <option value="">Select Class</option>
                @foreach($classes as $class)
                <option value="{{$class->id}}">{{$class->name}}</option>
                @endforeach
                
            </select>
        </div>
                </div>
              </div>
              <div class="col-5">
              <div class="form-group">
            <h5>Student Fee Amount <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="amount[]"  class="form-control" >
            </div>
            </div>
              </div>
              <div class="col-2" style="padding-top:25px;">
                <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
              </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      var counter=0;
      $(document).on("click",".addeventmore",function(){
        var whole_extra_item_add = $('#whole_extra_item_add').html();
        $(this).closest(".add_item").append(whole_extra_item_add)
        counter++;
      });
      $(document).on("click",".removeeventmore",function(event){
        
        $(this).closest(".delete_whole_extra_item_add").remove();

        counter--;
      });
    });
  </script>
@endsection