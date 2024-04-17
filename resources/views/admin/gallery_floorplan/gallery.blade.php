@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gallery</h1>
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

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Upload File</h3>
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('admin.gallery.store') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        {{-- <label for="inputGroupFile01" class="form-label">Upload</label> --}}
                                                        <input type="file" name="files[]" class="form-control" multiple
                                                            id="inputGroupFile01" accept=".jpeg,.png,.jpg,.gif">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th width="560px">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($data)
                                            @foreach ($data as $key => $gallery)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $gallery->name }}</td>

                                                    <td>
                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['admin.gallery.destroy', $gallery->id],
                                                            'style' => 'display:inline',
                                                            'onsubmit' => 'return confirm("Are you sure you want to delete this image?");',
                                                        ]) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
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
