@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
	  <section class="content">
<div class="row">
	<div class="col-12">
	<div class="box bb-3 border-warning">
		<div class="box-header">
			<h4 class="box-title">Student <strong>Search</strong></h4>
		</div>
		<div class="box-body">
			<form method="GET" action="{{route('registration.search')}}">
				<div class="row">
				<div class="col-md-4">
                  <div class="form-group">
                  <h5>Year</h5>
                  <div class="controls">
                     <select name="year_id" class="form-control" required>
                       <option value="" selected>Select Year</option>
                       @foreach($year as $years)
                       <option value="{{$years->id}}" {{(@$year_id == $years->id)? "selected":""}}>{{$years->name}}</option>
                       @endforeach
                     </select>
                 
                  </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <h5>Class</h5>
                  <div class="controls">
                     <select name="class_id" class="form-control" required>
                       <option value="" selected>Select Class</option>
                       @foreach($class as $classes)
                       <option value="{{$classes->id}}" {{(@$class_id == $classes->id)? "selected":""}}>{{$classes->name}}</option>
                       @endforeach
                     </select>
                  
                  </div>
                  </div>
                  </div>

				  <div class="col-md-4 pt-25">
					  <input type="submit" name="search" class="btn btn-rounded btn-dark"value="Search">
				  </div>
				</div>
			</form>
		</div>
	</div>
	</div>
<div class="col-12">

		   <div class="box">
			  <div class="box-header with-border">
				<h3 class="box-title">Student List</h3>
                <a href="{{route('registration.add')}}" class="btn btn-rounded btn-success mb-5 float-right">Add Student</a>
			  </div>
			  <!-- /.box-header -->
			  <div class="box-body">
				  <div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped">
					  <thead>
						  <tr>
							  <th width="5%">SN</th>
							  <th>Name</th>
							  <th>ID No</th>
                              <th>Roll</th>
							  <th>Year</th>
							  <th>Class</th>
							  <th>Image</th>
							  @if(Auth::user()->role == 'admin')
							  <th>Code</th>
							  @endif
							  <th width="25%">Action</th>
						  </tr>
					  </thead>
					  <tbody>
						  @foreach($allData as $key=>$value)
						  <tr>
							  <td>{{$key+1}}</td>
							  
							  <td>{{$value->student->name}}</td>
							  <td>{{$value->student->id_no}}</td>
                              <td>{{$value->roll}}</td>
							  <td>{{$value->Year->name}}</td>
							  <td>{{$value->Class->name}}</td>
							  <td>
							  <img src="{{!($value->student->image) ? asset('upload/no_image.png') : Storage::url($value->student->image)}}" style="width:100px;">
							  </td>
							  <td>{{$value->student->code}}</td>
							  
							 
							  <td>
								<a href="{{route('registration.edit',$value->student_id)}}" class="btn btn-info mr-5 ">Edit</a>
								<a href="{{route('registration.promote',$value->student_id)}}" class="btn btn-danger" >Promote</a>	  
							  </td>
							  
						  </tr>
						  @endforeach
						  
					  </tbody>
					  
					</table>
				  </div>
			  </div>
			  <!-- /.box-body -->
			</div>
			<!-- /.box -->

			
			<!-- /.box -->          
		  </div>
</div>
</div>
</section>
</div>
</div>


@endsection