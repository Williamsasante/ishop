@extends('admin.admin_master')
@section('admin')


	  <div class="container-full">
		
		<!-- Main content -->
		<section class="content">
		  <div class="row">


<!--- --------------Add All Your Brands ----------------------------------------------------------------------------------- -->


<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Brand</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


                    <form method="POST" action="{{route('brand.update',$brand->id)}}" enctype="multipart/form-data">
                     @csrf
					 <input type="hidden" name="id" value="{{$brand->id}}">
					 <input type="hidden" name="old_image" value="{{$brand->brand_image}}">


                            <div class="form-group">
								<h5>Brand Name<span class="text-danger">*</span></h5>
								<div class="controls">
							<input  type="text" name="brand_name" class="form-control" value="{{$brand->brand_name}}"></div>
                            @error('brand_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
							</div>  

                            <div class="form-group">
								<h5>Brand Image<span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="file" name="brand_image" class="form-control"></div>
                                    @error('brand_image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
							</div>  
							</div> 
                            
                            
                <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-primary mb-5 mt-4" value="Update">
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