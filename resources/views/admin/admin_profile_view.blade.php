@extends('admin.admin_master')
@section('admin')

<div class="container-full">

<!-- Main content -->
<section class="content">
    <div class="row">

    <div class="box box-inverse bg-img"  data-overlay="4">
					  <div class="flexbox px-25 pt-30">
					  </div>

    <div class="box-body text-center pb-20">
    <a href="#">
    <img class="avatar avatar-xxl avatar-bordered" src="{{ (!empty($adminData->profile_photo_path))? url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg') }}">
    </a>
    <h4 class="mt-2 mb-0"><a class="hover-primary text-white" ><b>Admin Name:</b> {{$adminData->name}}</a></h4>
    <h6 class="mt-2 mb-0"><a class="hover-primary text-white" ><b>Admin Email:</b> {{$adminData->email}}</a></h6>
    <a href="{{route('admin.profile.edit')}}" style="float: centre;" class="btn btn-rounded btn-success mb-5 mt-4" >Edit Profile</a>
    </div>

    <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
        <li>
        <span class="opacity-20"></span><br>
        <span class="font-size-20"></span>
        </li>
        <li>
        <span class="opacity-60"></span><br>
        <span class="font-size-20"></span>
        </li>
        <li>
        <span class="opacity-60"></span><br>
        <span class="font-size-20"></span>
        </li>
    </ul>
    </div>       
     </div>
</section>
<!-- /.content -->
</div>
@endsection