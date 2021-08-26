@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
	  <section class="content">
<div class="row">
<div class="col-12">

		   <div class="box">
			  <div class="box-header with-border">
				<h3 class="box-title">Fee Amount List</h3>
                <a href="{{route('fee.amount.add')}}" class="btn btn-rounded btn-success mb-5 float-right">Add Fee Amount</a>
			  </div>
			  <!-- /.box-header -->
			  <div class="box-body">
				  <div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped">
					  <thead class="thead-light">
						  <tr>
							  <th width="5%">SN</th>
							  <th>Fee Category</th>
							  <th width="25%">Action</th>
						  </tr>
					  </thead>
					  <tbody>
						  @foreach($allData as $key=>$amount)
						  <tr>
							  <td>{{$key+1}}</td>
							  
							  <td>{{$amount->fee_category->name}}</td>
							 
							  <td>
								<a href="{{route('fee.amount.edit',$amount->feecategory_id)}}" class="btn btn-info mr-5 ">Edit</a>
								<a href="{{route('fee.amount.details',$amount->feecategory_id)}}" class="btn btn-primary " >Detail</a>	  
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