@extends('admin.layouts.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create New User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <form method="post" class="" action="{{ route('admin.users.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-6 my-1 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Name:</strong>
                                                <input class="form-control" value="{{ old('name') }}" name="name"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 my-1 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Email:</strong>
                                                <input class="form-control" value="{{ old('email') }}" type="email"
                                                    name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 my-1 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>User Name:</strong>
                                                <input type="text" class="form-control" name="username"
                                                    value="{{ old('username') }}" maxlength="15" placeholder="TonyNguyen01"
                                                    required pattern="[a-zA-Z0-9]{1,10}">
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">User Name must not contain spaces and must not
                                                    exceed 15 characters.</div>

                                            </div>
                                        </div>
                                        <div class="col-xs-6 my-1 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Password:</strong>
                                                <input class="form-control" type="password" name="password" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 my-1 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Confirm Password:</strong>
                                                <input class="form-control" type="password" name="confirm-password"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 my-1 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <strong>Role:</strong>
                                                <select name="roles[]" class="form-select" required>
                                                    <option selected hidden>select role</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 my-1 col-sm-12 col-md-12 text-center ">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // Add event listener to input element with name "username"
            $('input[name="username"]').on('keyup', function() {
                // Validate the "username" field
                $('#form').bootstrapValidator('validateField', 'username');

                // Add or remove classes based on validation result
                if ($(this).val().length > 0 && $(this).val().match(/^[a-zA-Z0-9]{1,15}$/)) {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                } else {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                }
            });
        });
    </script>
@endsection
