@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
	  <section class="content">
<div class="row">
<div class="col-12">

		   <div class="box">
			  <div class="box-header with-border">
				<h3 class="box-title">Asigned Subjects Details</h3>
                <a href="{{route('assign.subject.add')}}" class="btn btn-rounded btn-success mb-5 float-right">Add Fee Amount</a>
			  </div>
			  <!-- /.box-header -->
			  <div class="box-body">
				  <div class="table-responsive">
                      <h4><strong>Class: </strong>{{$detailsData[0]->student_class->name}}</h4>
					<table id="example1" class="table table-bordered table-striped">
					  <thead class="thead-light">
						  <tr>
							  <th width="5%">SN</th>
							  <th>Subjects</th>
							  <th width="10%">Full Mark</th>
                              <th width="10%">Pass Mark</th>
                              <th width="10%">Subjective Mark</th>
						  </tr>
					  </thead>
					  <tbody>
						  @foreach($detailsData as $key=>$details)
						  <tr>
							  <td>{{$key+1}}</td>
							  
							  <td>{{$details->subject->name}}</td>
							 
							  <td>{{$details->full_mark}}</td>
							  <td>{{$details->pass_mark}}</td>
							  <td>{{$details->subjective_mark}}</td>
							  
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