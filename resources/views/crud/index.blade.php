@extends('layouts.master')

@section('title','CRUD Ajax')

@section('content')
  <div class="container">
    <h2>CRUD Operation in Laravel 5.3</h2>
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
    <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Add</button>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

        @foreach($data as $x)
        <tr>
          <td>{{$x -> first_name}}</td>
          <td>{{$x->last_name}}</td>
          <td>{{$x->email}}</td>
          <td>
            <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x->id}}')">View</button>
            <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x->id}}')">Edit</button>
            <button class="btn btn-danger" onclick="fun_delete('{{$x->id}}')">Delete</button>
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('crud/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('crud/delete')}}">
    <!-- Add Modal start -->
    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-tittle">Add Record</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('crud') }}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <div class="form-group">
                  <label for="first_name">First Name:</label>
                  <input type="text" class="form-control" id="first_name" name="first_name">
                </div>
                <div class="form-group">
                  <label for="first_name">Last Name:</label>
                  <input type="text" class="form-control" id="last_name" name="last_name">
                </div>
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>

              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <!-- add code end -->

    <!-- View Modal start -->
    <div class="modal fade" id="viewModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-tittle">View</h4>
          </div>
          <div class="modal-body">
            <p><b>First Name : </b><span id="view_fname" class="text-success"></span></p>
            <p><b>Last Name : </b><span id="view_lname" class="text-success"></span></p>
            <p><b>Email : </b><span id="view_email" class="text-success"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <!-- view modal ends -->

    <!-- Edit Modal start -->
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('crud/update') }}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <div class="form-group">
                  <label for="edit_first_name">First Name:</label>
                  <input type="text" class="form-control" id="edit_first_name" name="edit_first_name">
                </div>
                <div class="form-group">
                  <label for="edit_last_name">Last Name:</label>
                  <input type="text" class="form-control" id="edit_last_name" name="edit_last_name">
                </div>
                <label for="edit_email">Email address:</label>
                <input type="email" class="form-control" id="edit_email" name="edit_email">
              </div>

              <button type="submit" class="btn btn-default">Update</button>
              <input type="hidden" id="edit_id" name="edit_id">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

        </div>

      </div>
    </div>

    <!-- Edit code ends -->

  </div>
  <script type="text/javascript">
    function fun_view(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET",
        data: {"id":id},
        success: function(result){
          // console.log(result);
          $("#view_fname").text(result.first_name);
          $("#view_lname").text(result.last_name);
          $("#view_email").text(result.email);
        }
      });
    }

    function fun_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET",
        data: {"id":id},
        success: function(result){
          // console.log(result);
          $("#edit_id").val(result.id);
          $("#edit_first_name").val(result.first_name);
          $("#edit_last_name").val(result.last_name);
          $("#edit_email").val(result.email);
        }
      });
    }
    function fun_delete(id)
    {
      var conf = confirm("Are you sure want to delete??");
      if (conf) {
        var delete_url = $("#hidden_delete").val();
        $.ajax({
          url: delete_url,
          type:"POST",
          data: {"id":id,_token: "{{ csrf_token() }}"},
          success: function(response){
            alert(response);
            location.reload();
          }
        });
      }
      else{
        return false;
      }
    }
  </script>

@endsection
