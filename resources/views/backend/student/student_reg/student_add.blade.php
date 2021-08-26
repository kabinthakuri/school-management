@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="content-wrapper">
        <div class="container-full">
        <section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Add Year</h4>
     
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
           <form action="{{route('registration.store')}}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                  <h5>Student Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="name"  class="form-control" required>
                  @error('name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                  <h5>Father's Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="fname"  class="form-control" required>
                  @error('fname')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                  <h5>Mother's Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="mname"  class="form-control" reqiured>
                  @error('mname')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                  <h5>Mobile Number <span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="mobile"  class="form-control" required>
                  @error('mobile')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                  <h5>Address <span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="address"  class="form-control" required>
                  @error('address')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                  <h5>Gender<span class="text-danger">*</span></h5>
                  <div class="controls">
                     <select name="gender" class="form-control" required>
                       <option value="" selected>Select Gender</option>
                       <option value="male">Male</option>
                       <option value="female">Female</option>
                     </select>
                  @error('gender')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  </div>
                  </div>

                </div>
               
                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                  <h5>Religion<span class="text-danger">*</span></h5>
                  <div class="controls">
                     <select name="religion" class="form-control" required>
                       <option value="" selected>Select Religion</option>
                       <option value="hindu">Hindu</option>
                       <option value="islam">Islam</option>
                       <option value="christian">Christian</option>
                       <option value="buddhism">Buddhism</option>
                       <option value="other">Other</option>
                     </select>
                  @error('religion')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <h5>Date of Birth <span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="date" name="dob"  class="form-control" required>
                  @error('dob')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                  <h5>Discount <span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="discount"  class="form-control" required>
                  @error('address')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  </div>
                  </div>

                  

                </div>
            
                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                  <h5>Year<span class="text-danger">*</span></h5>
                  <div class="controls">
                     <select name="year_id" class="form-control" required>
                       <option value="" selected>Select Year</option>
                       @foreach($year as $years)
                       <option value="{{$years->id}}">{{$years->name}}</option>
                       @endforeach
                     </select>
                  @error('year_id')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <h5>Class<span class="text-danger">*</span></h5>
                  <div class="controls">
                     <select name="class_id" class="form-control" required>
                       <option value="" selected>Select Class</option>
                       @foreach($class as $classes)
                       <option value="{{$classes->id}}">{{$classes->name}}</option>
                       @endforeach
                     </select>
                  @error('class_id')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                  <h5>Group<span class="text-danger">*</span></h5>
                  <div class="controls">
                     <select name="group_id" class="form-control" required>
                       <option value="" selected>Select Group</option>
                       @foreach($group as $groups)
                       <option value="{{$groups->id}}">{{$groups->name}}</option>
                       @endforeach
                     </select>
                  @error('group_id')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  </div>
                  </div>

                </div>

                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                  <h5>Shift<span class="text-danger">*</span></h5>
                  <div class="controls">
                     <select name="shift_id" class="form-control" required>
                       <option value="" selected>Select Shift</option>
                       @foreach($shift as $shifts)
                       <option value="{{$shifts->id}}">{{$shifts->name}}</option>
                       @endforeach
                     </select>
                  @error('shift_id')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <h5>Image<span class="text-danger">*</span></h5>
                  <div class="controls">
                     <input type="file" name="image" id="image"class="form-control" required>
                  @error('class_id')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                  <img id="showimage" src="{{asset('upload/no_image.png')}}" style="width:150px; border:1px solid #000000">
                  <div class="controls">
                     
                  </div>
                  </div>
                  </div>

                </div>

                  <input type="submit" class="btn btn-info btn-rounded mb-5" value="Submit">
               

                 
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