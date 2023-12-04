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

                <h6 class="card-title"> Add Permission</h6>

                <form id="myForm" method="POST" action="{{route('store.permission')}}"  class="forms-sample">
                  @csrf
                    <div class="form-group mb-3">
                        <label for="exampleInputUsername1" class="form-label">Permission Name</label>
                        <input type="text" name="name"  class="form-control"  autocomplete="off" >  
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputUsername1" class="form-label">Group Name</label>
                        <select name="group_name" class="form-select" id="">
                            <option selected="" disabled="">Select Group</option>
                            <option value="type">Property Type</option>
                            <option value="amenities">Amenities</option>
                        </select>
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