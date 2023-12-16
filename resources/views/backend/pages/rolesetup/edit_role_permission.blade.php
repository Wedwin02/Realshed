@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style type="text/css">
.form-check-label {
    text-transform: capitalize;
}

</style>
<div class="page-content">

    <div class="row">
      <div class="col-12 grid-margin">
        
    <div class="row profile-body">

      <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
          <div class="card">
            <div class="card-body">

                <h6 class="card-title"> Edit Role in Permission</h6>

                <form id="myForm" method="POST" action="{{route('admin.role.update',$roles->id)}}"  class="forms-sample">
                  @csrf
                    <div class="form-group mb-3">
                        <label for="exampleInputUsername1" class="form-label">Role Name</label>
                            <h3>{{$roles->name}}</h3>
                    </div>
                    <div class="col-9">
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="checkDefaultmain">
                            <label for="checkDefaultmain">Permission All</label>
            
                        </div>
                    </div>
      <hr>
                    @foreach($permission_groups as $group)
            <div class="row">
                <div class="col-3">
                    @php
                    $permissions = App\Models\User::getPermissionByGroupName($group->group_name)                        
                    @endphp
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="checkDefault"{{App\Models\User::roleHasPermissions($roles,$permissions)?'checked':''}}>
                        <label for="checkDefault">{{$group->group_name}}</label>
        
                    </div>
                </div>
                <div class="col-9">
                    @foreach($permissions as $permission)
                    <div class="form-check mb-2">
                        <input type="checkbox" name=" permission[] " class="form-check-input" value="{{ $permission->id }}" {{$roles->hasPermissionTo($permission->name)?'checked':''}}>
                        <label for="{{$permission->id}}">{{$permission->name}}</label>
                    </div>
                    @endforeach
                    <br>
                </div>            
            </div>
            @endforeach
     
                   
                    <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                 
                </form>

</div>
            
          </div>
        </div>
      </div>
    
          
    </div>

        </div>

        <script type="text/javascript">
        $('#checkDefaultmain').click(function(){
            if($(this).is(':checked')){
                $('input[type=checkbox]').prop('checked',true);
            }else{
                $('input[type=checkbox]').prop('checked',false);
            }
        })
          
    
          
      </script>





@endsection