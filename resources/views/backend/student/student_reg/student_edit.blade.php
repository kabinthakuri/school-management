@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="content-wrapper">
        <div class="container-full">
        <section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Edit Student</h4>
     
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
           <form action="{{route('registration.update',$editData->student_id)}}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                  <h5>Student Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="name"  class="form-control" value="{{$editData->student->name}}" required>
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
                      <input type="text" name="fname"  class="form-control" value="{{$editData->student->fname}}" required>
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
                      <input type="text" name="mname"  class="form-control" value="{{$editData->student->mname}}" reqiured>
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
                      <input type="text" name="mobile"  class="form-control" value="{{$editData->student->mobile}}" required>
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
                      <input type="text" name="address"  class="form-control" value="{{$editData->student->address}}" required>
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
                       
                       <option value="male" @if($editData->student->gender == 'male')selected @endif>Male</option>
                       <option value="female" @if($editData->student->gender == 'female')selected @endif>Female</option>
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
                       
                       <option value="hindu" @if($editData->student->religion == 'hindu')selected @endif>Hindu</option>
                       <option value="islam" @if($editData->student->religion == 'islam')selected @endif>Islam</option>
                       <option value="christian" @if($editData->student->religion == 'christian')selected @endif>Christian</option>
                       <option value="buddhism" @if($editData->student->religion == 'buddhism')selected @endif>Buddhism</option>
                       <option value="other" @if($editData->student->religion == 'other')selected @endif>Other</option>
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
                      <input type="date" name="dob"  class="form-control" value="{{$editData->student->dob}}"required>
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
                      <input type="text" name="discount"  class="form-control" value="{{$editData->discount->discount}}" required>
                  @error('discount')
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
                       <option value="{{$years->id}}" @if ($editData->year_id == $years->id)selected @endif>{{$years->name}}</option>
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
                       <option value="{{$classes->id}}"@if ($editData->class_id == $classes->id)selected @endif>{{$classes->name}}</option>
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
                       <option value="{{$groups->id}}"@if ($editData->group_id == $groups->id)selected @endif>{{$groups->name}}</option>
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
                       <option value="{{$shifts->id}}" @if ($editData->shift_id == $shifts->id)selected @endif>{{$shifts->name}}</option>
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
                     <input type="file" name="image" id="image"class="form-control" >
                  @error('class_id')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
                  </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                  <img id="showimage" src="{{($editData->student->image)?Storage::url($editData->student->image):asset('upload/no_image.png')}}" style="width:150px; border:1px solid #000000">
                  <div class="controls">
                     
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