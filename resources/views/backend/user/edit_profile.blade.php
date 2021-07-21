@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="content-wrapper">
        <div class="container-full">
        <section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Edit Profile</h4>
     
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
           <form action="{{route('profile.store')}}" method="post" enctype="multipart/form-data">
               @csrf
            
                    
                        <div class="row">
                        <div class="col-6">						
                   <div class="form-group">
                       <h5>User Email <span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="email" name="email" class="form-control" value="{{$editData->email}}" > </div>
                        </div>
                        </div>
                        <div class="col-6">						
                   <div class="form-group">
                       <h5>User Name <span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="text" name="name" class="form-control" value="{{$editData->name}}" > </div>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-6">						
                   <div class="form-group">
                       <h5>User Address<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="text" name="address" class="form-control" value="{{$editData->address}}" > </div>
                        </div>
                        </div>
                    <div class="col-6">						
                   <div class="form-group">
                       <h5>User Phone<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="text" name="mobile" class="form-control" value="{{$editData->mobile}}" > </div>
                        </div>
                        </div>
                    </div>

                    <div class="row">
             <div class="col-6">
                        
                        <div class="form-group">
                            <h5>User Gender <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male" @if($editData->gender == "male")selected @endif>Male</option>
                                    <option value="female" @if($editData->gender == "female")selected @endif>Female</option>
                                    
                                </select>
                            </div>
                        </div>
               
                    </div>
                    <div class="col-6">						
                   <div class="form-group">
                       <h5>Profile Image<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="file" name="image" class="form-control" id="image" > </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <img id="showimage" src="{{!($editData->image) ? asset('upload/no_image.png') : asset('upload/user_images/'.$editData->image)}}" style="width:150px; border:1px solid #000000">
                            </div>
                        </div>
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

    <script>
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showimage').attr('src',e.target.result);

                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })

    </script>
@endsection