@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
          <a href="{{route('export.permission')}}" class="btn btn-inverse-danger">Download Excel file</a>
        </ol>
    </nav>
    <div class="row">
      <div class="col-12 grid-margin">
        
    <div class="row profile-body">
 
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
          <div class="card">
            <div class="card-body">

                <h6 class="card-title"> Import Permission</h6>

                <form id="myForm" method="POST" action="{{route('import')}}"  class="forms-sample" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group mb-3">
                        <label for="exampleInputUsername1" class="form-label">Xlsx import file</label>
                        <input type="file" name="import_file"  class="form-control"  autocomplete="off" >  
                    </div>
                  
                    <button type="submit" class="btn btn-danger me-2">Upload</button>
                 
                </form>

</div>
            
          </div>
        </div>
      </div>
    
          
    </div>

        </div>

@endsection