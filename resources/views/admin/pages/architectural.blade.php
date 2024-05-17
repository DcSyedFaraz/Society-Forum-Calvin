@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Architectural Request Form</h1>
                <!-- <p>Welcome {{ auth()->user()->name }}</p> -->
                <br>
                <div class="formmm">
                    <div class="formss">
                        <div class="card-body">
                            <form action="{{ route('admin.architectural.save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Name Of Homeowner</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Tony Nguyen">
                                </div>
                                <div class="mb-3">
                                    <label for="phoneNumber" class="form-label">Phone Number Of Homeowner</label>
                                    <input type="tel" class="form-control" name="phone" id="phoneNumber" value="{{ old('phone') }}" placeholder="+1 3934 3445 33">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Of Homeowner</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="tony@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="Requested" class="form-label">Requested Change</label>
                                    <input type="text" class="form-control" name="requestedchange" id="Requested" value="{{ old('requestedchange') }}" placeholder="Type Here">
                                </div>

                                <div class="mb-3">
                                    <label for="hoaaddress" class="form-label">Upload Image/Sketch</label>
                                    <input class="form-control" type="file" id="image" name="image"
                                        placeholder="Choose Images">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
