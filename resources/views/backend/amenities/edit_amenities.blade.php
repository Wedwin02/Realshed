@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

    <div class="row">
      <div class="col-12 grid-margin">
        
    <div class="row profile-body">
 
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
          <div class="card">
            <div class="card-body">

                <h6 class="card-title"> Edit Amenities</h6>

                <form id="myForm" method="POST" action="{{route('update.amenities')}}"  class="forms-sample">
                  @csrf

                  <input type="hidden" name="id" value="{{$amenities->id}}" class="forms-sample">
                    <div class="form-group mb-3">
                        <label for="exampleInputUsername1" class="form-label">Type Name</label>
                        <input type="text" name="amenities_name"  class="form-control" id="amenities_name" autocomplete="off" value="{{$amenities->amenities_name}}" >
       
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
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                      amenities_name: {
                            required : true,
                        }, 
                        
                    },
                    messages :{
                      amenities_name: {
                            required : 'Please Enter Amanities',
                        }, 
                         
        
                    },
                    errorElement : 'span', 
                    errorPlacement: function (error,element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight : function(element, errorClass, validClass){
                        $(element).addClass('is-invalid');
                    },
                    unhighlight : function(element, errorClass, validClass){
                        $(element).removeClass('is-invalid');
                    },
                });
            });
            
        </script>
  


@endsection