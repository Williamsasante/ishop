@extends('admin.admin_master')
@section('admin')


	  <div class="container-full">
		
		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			


			

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Category List<span class="badge badge-pill badge-danger"> {{ count($category) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category Icon</th>
								<th>Category Name</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
						@foreach($category as $item)
	 <tr>
		<td><span><i class="{{ $item->category_icon}}"></i></span></td>
		<td>{{ $item->category_name}}</td>
		<td>
 <a href="{{route('category.edit.edit',$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
 <a href="{{ route('category.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 	<i class="fa fa-trash"></i></a>
		</td>
							 
	 </tr>
	  @endforeach
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			  
			  <!-- /.box -->          
			</div>
			<!-- /.col -->


<!--- --------------Add All Your Categories ----------------------------------------------------------------------------------- -->


<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Brand</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


                    <form method="POST" action="{{route('category.store')}}">
                     @csrf


                            <div class="form-group">
								<h5>Category Name<span class="text-danger">*</span></h5>
								<div class="controls">
							<input  type="text" name="category_name" class="form-control"></div>
                            @error('category_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
							</div> 
							<div class="form-group">
								<h5>Category Icon <span class="text-danger">*</span></h5>
								<div class="controls">
							<input  type="text" name="category_icon" class="form-control"></div>
                            @error('category_icon')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
							</div>  

                            
							</div> 
                            
                            
                <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-primary mb-5 mt-4" value="Add New">
                </div>
        </form>

    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
					 
					</div>
				</div>
			  </div>        
			</div>
			

<!---end --------------Add All Your Brands ---------- end ------------------------------------------------------------------------------ -->





		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
 




@endsection