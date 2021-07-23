@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
        <section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Edit Shift</h4>
     
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
           <form action="{{route('student.shift.update',$shift->id)}}" method="post">
               @csrf
               <div class="form-group">
            <h5>Student Shift Name <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name" value="{{$shift->name}}" class="form-control" >
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
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
@endsection