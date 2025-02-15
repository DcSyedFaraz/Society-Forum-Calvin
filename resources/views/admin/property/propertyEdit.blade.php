@extends('admin.layouts.app')
<style>
    .landlordersect {
        padding: 20px;
        border: 1px solid #8e7b56;
        border-radius: 30px;
        margin-bottom: 18px;
    }

    .menu-title {
        margin-left: 10px;
    }

    ul.insightss {
        position: absolute;
        bottom: 20px;
        background: 0 0;
        display: -ms-flexbox;
        display: flex;
        padding: 10px;
        margin-top: 90px;
        -ms-flex-direction: column;
        width: 100%;
        align-content: stretch;
        flex-direction: column;
        align-items: stretch;
    }

    ul.insightss li {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        position: relative;
    }

    ul.insightss a {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: left;
        padding: 10px 15px;
        border-radius: 4px;
        font-size: 14px;
        color: #5f5f5f;
        outline-width: 0;
        text-overflow: ellipsis;
        overflow: hidden;
        letter-spacing: 0.5px;
        border-left: 4px solid rgb(255 255 255 / 0%);
        transition: all 0.2s ease-out;
    }

    ul.insightss li:hover img {
        filter: brightness(0) invert(1);
    }

    ul.insightss a:hover {
        color: #fff;
        text-decoration: none;
        background: #ffffff;
        border-left: 4px solid #ffffff;
        background-color: #8e7b56;
        border-radius: 50px;
    }

    ul.insightss a:active {
        color: #fff;
        text-decoration: none;
        background: #ffffff;
        border-left: 4px solid #ffffff;
        background-color: #8e7b56;
        border-radius: 50px;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit Property</h1>
                <div class="card-body">
                    {{-- <p class="text-danger"><b>If you encounter any issues while completing the form, please email <a
                                href="mailto:parkshadowshomeowners@gmail.com">parkshadowshomeowners@gmail.com</a> </b></p> --}}
                    <form action="{{ route('admin.list.update', $property->id) }}" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        @method('PUT')
                        <h4>
                            Provide A Link To A Website Or Websites To Promote The
                            Property
                        </h4>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="url" name="promote_url"
                                placeholder="www.example.com" value="{{ old('promote_url', $property->promote_url) }}">
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
                                    <label for="landlord" class="form-label">Image Of Property</label>
                                    <input type="file" class="form-control" name="images[]" multiple accept="image/*" />
                                    <small class="fw-bold">*File Size 4mb or less</small>
                                </div>

                                <div class="mb-3">
                                    <label for="number" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="title..."
                                        value="{{ old('title', $property->title) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="number" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" name="phone" placeholder="+1234567890"
                                        value="{{ old('phone', $property->phone) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="number" class="form-label">Sale Price Of Property</label>
                                    <input type="number" class="form-control" id="number" name="price"
                                        placeholder="$0000" value="{{ old('price', $property->price) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="area" class="form-label">Area (square feet)</label>
                                    <input type="number" class="form-control" id="area" name="area"
                                        placeholder="Area" value="{{ old('area', $property->area) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="beds" class="form-label">Beds</label>
                                    <input type="number" class="form-control" id="beds" name="beds"
                                        placeholder="Number of Beds" value="{{ old('beds', $property->beds) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="baths" class="form-label">Baths</label>
                                    <input type="number" class="form-control" id="baths" name="baths"
                                        placeholder="Number of Baths" value="{{ old('baths', $property->baths) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="garages" class="form-label">Garage (number of cars)</label>
                                    <input type="number" class="form-control" id="garages" name="garages"
                                        placeholder="Number of Garages" value="{{ old('garages', $property->garages) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Real Estate Contact Information</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Tonynguyen@example.com" value="{{ old('email', $property->email) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="addressurl" class="form-label">A Link To The Real Estate Agent's Or Real
                                        Estate Company's Website</label>
                                    <input type="text" class="form-control" id="addressurl" name="company_website"
                                        placeholder="www.example.com"
                                        value="{{ old('company_website', $property->company_website) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="currentaddress" class="form-label">Address of Current Property</label>
                                    <input type="text" class="form-control" name="address" placeholder="Address"
                                        value="{{ old('address', $property->address) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="existingImages" class="form-label">Existing Images</label>
                                    <div class="existing-images">
                                        @foreach ($property->images as $image)
                                            <div class="image-container"
                                                style="display:inline-block; position: relative; margin-right: 10px;">
                                                <img src="{{ asset('storage/' . $image->image) }}" alt="Property Image"
                                                    width="100">
                                                <button type="button" class="btn btn-danger btn-sm delete-image"
                                                    data-image-id="{{ $image->id }}"
                                                    style="position: absolute; top: 0; right: 0; padding: 2px 7px !important;">X</button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-image').forEach(button => {
                button.addEventListener('click', function() {
                    const imageId = this.getAttribute('data-image-id');
                    if (confirm('Are you sure you want to delete this image?')) {
                        fetch('{{ route('admin.list.image.delete', '') }}/' + imageId, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    this.closest('.image-container').remove();
                                    toastr.success('Image deleted successfully.');
                                } else {
                                    toastr.error('An error occurred while trying to delete the image.');
                                    // alert(
                                    //     'An error occurred while trying to delete the image.'
                                    // );
                                }
                            });
                    }
                });
            });
        });
    </script>
@endsection
