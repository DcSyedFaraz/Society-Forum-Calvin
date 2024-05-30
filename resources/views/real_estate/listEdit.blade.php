@extends('real_estate.layouts.app')
<style>
    /* Your CSS styles here */
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit Real Estate Property</h1>
                <!-- You can add any additional information or messages here -->
                <div class="card-body">
                    <form action="{{ route('agent.list.update', $property->id) }}" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        @method('PUT') <!-- Use PUT method for updating -->
                        <h4>
                            Provide A Link To A Website Or Websites To Promote The
                            Property
                        </h4>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="url" name="promote_url"
                                value="{{ $property->promote_url }}" placeholder="www.example.com" />
                        </div>
                        <div class="landlordersect">
                            <h4
                                style="
                                  width: 100%;
                                  display: block !important;
                                  margin-bottom: 20px;
                                ">
                                Design Brief Information And Image
                            </h4>
                            <div class="landlorder">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image Of Property</label>
                                    <input type="file" class="form-control" id="image" multiple name="images[]"
                                        accept="image/*">
                                        <small class="fw-bold">*File Size 4mb or less</small>
                                    @if ($property->images)
                                        @foreach ($property->images as $item)
                                            <div class="row">

                                                <div class="position-relative">
                                                    <!-- Your image -->
                                                    <img class="img-thumbnail" src="{{ asset('storage/' . $item->image) }}"
                                                        alt="Property Image"
                                                        style="max-width: 100px; max-height: 100px; margin-top: 10px;">

                                                    <!-- Overlay with X icon -->
                                                    <div class="position-absolute top-0 start-0 translate-middle p-2">
                                                        <!-- Bootstrap X icon -->
                                                        <a href="{{ route('agent.list.image', $item->id) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-x-lg text-danger" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M4.354 4.354a.5.5 0 0 1 .708 0L8 7.293l3.938-3.939a.5.5 0 0 1 .707.708L8.707 8l3.938 3.938a.5.5 0 0 1-.708.708L8 8.707l-3.938 3.938a.5.5 0 0 1-.707-.708L7.293 8 3.354 4.062a.5.5 0 0 1 0-.708z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $property->title }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                        value="{{ $property->phone }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Sale Price Of Property</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        value="{{ $property->price }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Real Estate Contact Information</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $property->email }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="company_website" class="form-label">A Link To The Real Estate Agent's Or
                                        Real
                                        Estate
                                        Company's Website</label>
                                    <input type="text" class="form-control" id="company_website" name="company_website"
                                        value="{{ $property->company_website }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address of Current Property</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{ $property->address }}" />
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
