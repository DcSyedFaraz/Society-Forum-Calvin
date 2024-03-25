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
                    <form action="{{ route('agent.list.update', $property->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT') <!-- Use PUT method for updating -->
                        <h4>
                            Provide A Link To A Website Or Websites To Promote The
                            Property
                        </h4>
                        <div class="mb-3">
                            <input type="url" class="form-control" id="url" name="promote_url"
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
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    @if($property->image)
                                        <img class="img-thumbnail" src="{{ asset('storage/' . $property->image) }}" alt="Property Image" style="max-width: 100px; max-height: 100px; margin-top: 10px;">
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
                                    <label for="company_website" class="form-label">A Link To The Real Estate Agent's Or Real
                                        Estate
                                        Company's Website</label>
                                    <input type="url" class="form-control" id="company_website" name="company_website"
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
