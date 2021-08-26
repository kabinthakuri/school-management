@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
	  <section class="content">
<div class="row">
<div class="col-12">

		   <div class="box">
			  <div class="box-header with-border">
				<h3 class="box-title">Designation List</h3>
                <a href="{{route('designation.add')}}" class="btn btn-rounded btn-success mb-5 float-right">Add Designation</a>
			  </div>
			  <!-- /.box-header -->
			  <div class="box-body">
				  <div class="table-responsive">
					<table id="designationple1" class="table table-bordered table-striped">
					  <thead>
						  <tr>
							  <th width="5%">SN</th>
							  <th>Name</th>
							  <th width="25%">Action</th>
						  </tr>
					  </thead>
					  <tbody>
						  @foreach($allData as $key=>$designation)
						  <tr>
							  <td>{{$key+1}}</td>
							  
							  <td>{{$designation->name}}</td>
							 
							  <td>
								<a href="{{route('designation.edit',$designation->id)}}" class="btn btn-info mr-5 ">Edit</a>
								<a href="{{route('designation.delete',$designation->id)}}" class="btn btn-danger " id="delete">Delete</a>	  
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