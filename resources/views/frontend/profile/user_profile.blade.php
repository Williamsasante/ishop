@extends('Frontend.main_master')
@section ('content')


<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
              <img class="card-img-top" style="border-radius: 50%;" src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}
              " height="80%" width="80%"><br><br>
              <ul class="list-group list-group-flush">
                <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                <a href="{{route('change.password')}}" class="btn btn-primary btn-sm btn-block">Change password</a>
                <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>

              </ul>

            </div>

            <div class="col-md-2"> 

            </div>

            <div class="col-md-6">
                <div class="card">
                    <h4 class="text-center"><span class="text-danger"><strong>{{Auth::user()->name}}  </strong></span> Update Profile Details</Details></h4>

                    <div class="card-body">
                        <form method="post" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                            @csrf

                         <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Name</label>
		    <input type="text" name="name" class="form-control"   value="{{$user->name}}" required autofocus>
          
		                </div>
                        
                        <div class="form-group">
		    <label class="info-title" for="email">Email</label>
		    <input type="email" name="email" class="form-control"  value="{{$user->email}}" required autofocus>
          
		                </div>
                        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Phone</label>
		    <input type="text" name="phone" class="form-control" id="name"  value="{{$user->phone}}" required autofocus>
          
		                </div>
                        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Image</label>
		    <input type="file" name="profile_photo_path" class="form-control" >
          
		                </div>
                        <div class="form-group">
		   <button type="submit" class="btn btn-danger">Update</button>
          
		                </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


@endsection 