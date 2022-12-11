@extends('admin.admin_master')
@section('admin')


	  <div class="container-full">
		
		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-8">
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">SubCategory List<span class="badge badge-pill badge-danger"> {{ count($subcategories) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category</th>
								<th>SubCategory Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach($subcategories as $item)
	 <tr>
		<td> {{ $item->category_id }}  </td>
		<td>{{ $item->subcategory_name }}</td>
		<td width="30%">
 <a href="{{ route('subcategory.edit.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

 <a href="{{ route('subcategory.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
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


<!--- --------------Add All Your Brands ----------------------------------------------------------------------------------- -->


<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add SubCategory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


                    <form method="POST" action="{{route('subcategory.store')}}" >
                     @csrf

                     <div class="form-group">
								<h5>Category Select<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id"   class="form-control">
										<option value="" selected="" disabled="">Select Category</option>
										@foreach($categories as $category)
										<option value="{{$category->id}}">{{$category->category_name}}</option>
										@endforeach
									</select>
							@error('category_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
							</div>  

								</div>
							</div>

                            <div class="form-group">
								<h5>SubCategory Name<span class="text-danger">*</span></h5>
								<div class="controls">
							<input  type="text" name="subcategory_name" class="form-control"></div>
                            @error('subcategory_name')
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