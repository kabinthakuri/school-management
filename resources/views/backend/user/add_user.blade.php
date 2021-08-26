@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
        <section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Add User</h4>
     
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
           <form action="{{route('user.store')}}" method="post">
               @csrf
             <div class="row">
             <div class="col-6">
                        
                        <div class="form-group">
                            <h5>User Role <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="role" id="role" class="form-control">
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="operator">Operator</option>
                                    
                                </select>
                            </div>
                        </div>
               
                    </div>
               <div class="col-6">						
                   <div class="form-group">
                       <h5>User Name <span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="text" name="name" class="form-control" > </div>
                        </div>
                        </div>
                    </div>
                    
                        <div class="row">
                        <div class="col-6">						
                   <div class="form-group">
                       <h5>Email <span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="email" name="email" class="form-control" > </div>
                        </div>
                        </div>
                   
                    <!-- <div class="col-6">						
                   <div class="form-group">
                       <h5>Password<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="password" name="password" class="form-control" > </div>
                        </div>
                        </div> -->
                    
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
@endsection