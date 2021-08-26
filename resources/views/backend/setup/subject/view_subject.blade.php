@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
	  <section class="content">
<div class="row">
<div class="col-12">

		   <div class="box">
			  <div class="box-header with-border">
				<h3 class="box-title">School Subject List</h3>
                <a href="{{route('school.subject.add')}}" class="btn btn-rounded btn-success mb-5 float-right">Add School subject</a>
			  </div>
			  <!-- /.box-header -->
			  <div class="box-body">
				  <div class="table-responsive">
					<table id="subjectple1" class="table table-bordered table-striped">
					  <thead>
						  <tr>
							  <th width="5%">SN</th>
							  <th>Name</th>
							  <th width="25%">Action</th>
						  </tr>
					  </thead>
					  <tbody>
						  @foreach($allData as $key=>$subject)
						  <tr>
							  <td>{{$key+1}}</td>
							  
							  <td>{{$subject->name}}</td>
							 
							  <td>
								<a href="{{route('school.subject.edit',$subject->id)}}" class="btn btn-info mr-5 ">Edit</a>
								<a href="{{route('school.subject.delete',$subject->id)}}" class="btn btn-danger " id="delete">Delete</a>	  
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