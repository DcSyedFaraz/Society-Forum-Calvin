@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title">User Managment</h3>
            </div> -->
           <!-- /.card-header -->
            <div class="card-header">
              <a class="btn btn-success" href="{{ route('admin.users.create') }}"> New User </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="myTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th width="560px">Action</th>
                </tr>
                </thead>

                <tbody>
                  @if($data)
                  @foreach ($data as $key => $user)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                          @if($user->roles->isNotEmpty())
                          <label class="badge bg-success text-uppercase">{{ $user->roles->first()->name }}</label>
                        @endif
                      </td>
                      <td>
                        <a class="btn btn-info" href="{{ route('admin.users.show',$user->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}">Edit</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'style'=>'display:inline']) !!}
                              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                      </td>

                    </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
              {!! $data->render() !!}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection




