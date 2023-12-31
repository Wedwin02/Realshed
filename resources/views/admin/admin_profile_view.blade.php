@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

    <div class="row">
      <div class="col-12 grid-margin">
        
    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">
            <div>
                <img class="wd-100 rounded-circle" src="{{(!empty($profileData->photo))?url('upload/admin_images/'.$profileData->photo):url('upload/no_image.jpg')}}" alt="profile">
                <span class="h4 ms-3 text-Ligth">{{$profileData->name}}</span>
              </div>
            </div>
            <p>Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of Social.</p>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">User:</label>
              <p class="text-muted">{{$profileData->username}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Rol:</label>
              <p class="text-muted">{{$profileData->role}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">{{$profileData->email}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">State:</label>
              <p class="text-muted">{{$profileData->status}}</p>
            </div>
            <div class="mt-3 d-flex social-links">
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="github"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
          <div class="card">
            <div class="card-body">

                <h6 class="card-title">Update Admin Profile</h6>

                <form method="POST" action="{{route('admin.profile.store')}}"  class="forms-sample" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Username</label>
                        <input type="text" name="username" value="{{$profileData->username}}"class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputUser" class="form-label">User</label>
                        <input type="text" name="name" value="{{$profileData->name}}"class="form-control" id="exampleInputUser" autocomplete="off" placeholder="User">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email"  name="email"  value="{{$profileData->email}}"class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPhone" class="form-label">Phone</label>
                        <input type="text"   name="phone" value="{{$profileData->phone}}"class="form-control" id="phone" placeholder="Phone">
                    </div>                   
                    <div class="mb-3">
                        <label for="exampleInputAddress" class="form-label">Adrress</label>
                        <input type="text"   name="address" value="{{$profileData->address}}"class="form-control" id="address" placeholder="Address">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPhone" class="form-label">Photo</label>
                        <input type="file"   name="photo" value="{{$profileData->photo}}"class="form-control" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"></label>
                        <img class="wd-80 rounded-circle" id="showImage" src="{{(!empty($profileData->photo))?url('upload/admin_images/'.$profileData->photo):url('upload/no_image.jpg')}}">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                 
                </form>

</div>
            
          </div>
        </div>
      </div>
    
          
    </div>

        </div>




<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>



@endsection