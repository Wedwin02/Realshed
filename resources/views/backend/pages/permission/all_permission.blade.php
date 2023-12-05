@extends('admin.admin_dashboard')
@section('admin')


  <div class="page-content">

      <nav class="page-breadcrumb">
          <ol class="breadcrumb">
            <a href="{{route('add.permission')}}" class="btn btn-inverse-success">Add Permission</a>
            &nbsp;&nbsp;&nbsp;
            <a href="{{route('export.permission')}}" class="btn btn-inverse-warning">Export Data</a>
            &nbsp;&nbsp;&nbsp;
            <a href="{{route('import.permission')}}" class="btn btn-inverse-danger">Import Data</a>
          </ol>
      </nav>

      <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h6 class="card-title">Permission</h6>
      
      <div class="table-responsive">
        <table id="dataTableExample" class="table">
          <thead>
            <tr>
              <th>S1</th>
              <th>Permission  Name</th>
              <th>Group  Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($permission as $key=>$item) 
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->group_name}}</td>
              <td>
                <a href="{{route('edit.permission',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                <a href="{{route('delete.permission',$item->id)}}" class="btn btn-inverse-danger" id="delete">Delete</a>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
          </div>
      </div>

  </div>





@endsection