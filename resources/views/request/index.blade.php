@extends('admin.layouts.app')
<style>
    #example td,
    #example th {
        white-space: nowrap;
    }

    div#tabler-tables {
        background: #FFFFFF 0% 0% no-repeat padding-box;
        box-shadow: 0px 10px 30px #00000029;
        border-radius: 22px;
        opacity: 1;
        padding: 30px;
    }

    div#tabler-tables h3 {
        border-bottom: 1px solid #ccc;
        padding-bottom: 15px;
    }

    table#example {
        padding: 20px 10px;
        margin: 0 auto;
        height: 250px;
        overflow: overlay;
        padding-top: 40px !important;
        position: relative;
        top: 30px;
    }

    table#example a.view {
        background: #8E7B56 0% 0% no-repeat padding-box;
        border-radius: 100px;
        opacity: 1;
        padding: 13px 20px;
        color: azure;
    }

    table#example a.approver {
        background: #8E7B56 0% 0% no-repeat padding-box;
        color: azure;
        border-radius: 100px;
        opacity: 1;
        padding: 13px 20px;
        margin-right: 10px;
    }

    table#example a.declined {
        background: #FF0000 0% 0% no-repeat padding-box;
        color: azure;
        border-radius: 100px;
        opacity: 1;
        padding: 13px 20px;
    }

    .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
        border: 1px solid #707070;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    .overlay:target {
        visibility: visible;
        opacity: 1;
    }

    .popup {
        margin: 95px auto auto;
        padding: 40px;
        display: table;
        width: 60%;
        position: relative;
        left: 78px;
        transition: all 5s ease-in-out;
        background: #FFFFFF 0% 0% no-repeat padding-box;
        box-shadow: 0px 10px 30px #00000029;
        border: 1px solid #8E7B56;
        border-radius: 20px;
        opacity: 1;
    }

    .popup h2 {
        margin-top: 0;
        color: #333;
        font-family: Tahoma, Arial, sans-serif;
    }

    .popup .close {
        position: absolute;
        top: 20px;
        right: 30px;
        transition: all 200ms;
        font-size: 30px;
        font-weight: bold;
        text-decoration: none;
        color: #333;
    }

    .popup .close:hover {
        color: #06D85F;
    }

    .popup .content {
        max-height: 30%;
        overflow: auto;
    }

    .popup form {
        display: grid;
        gap: 15px;
    }

    @media screen and (max-width: 700px) {
        .box {
            width: 70%;
        }

        .popup {
            width: 70%;
        }
    }
</style>
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/css/swiper.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/js/swiper.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
    <script>
        $(function() {

            var swiper = new Swiper('.carousel-gallery .swiper-container', {
                effect: 'slide',
                speed: 900,
                slidesPerView: 1,
                spaceBetween: 20,
                simulateTouch: true,
                autoplay: {
                    delay: 5000,
                    stopOnLastSlide: false,
                    disableOnInteraction: false
                },
                pagination: {
                    el: '.carousel-gallery .swiper-pagination',
                    clickable: true
                },
                breakpoints: {
                    // when window width is <= 320px
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 5
                    },
                    // when window width is <= 480px
                    425: {
                        slidesPerView: 1,
                        spaceBetween: 10
                    },
                    // when window width is <= 640px
                    768: {
                        slidesPerView: 1,
                        spaceBetween: 20
                    }
                }
            }); /*http://idangero.us/swiper/api/*/



        });
    </script>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="tabler-tables">
                    <h3>Property Requests</h3>
                    {{-- <h3>property Requests</h3> --}}
                    <div class="tablemaster" translate="no" data-new-gr-c-s-check-loaded="14.1157.0" data-gr-ext-installed="">
                        <div id="example_wrapper" class="dataTables_wrapper">
                            <div class="dataTables_length" id="example_length">
                            </div>
                            <table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid"
                                aria-describedby="example_info" style="width: 100%;">

                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Title:</th>
                                        <th>Email:</th>
                                        <th>Address:</th>
                                        <th>Phone Number:</th>
                                        <th>View:</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @if ($request->count() > 0)
                                        @foreach ($request as $key => $property)
                                            <tr class="odd">
                                                {{-- @dd($property) --}}
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $property->title ?? '' }}</td>
                                                <td>{{ $property->email ?? '' }}</td>
                                                <td>{{ $property->address ?? 'null' }}</td>
                                                <td>{{ $property->phone ?? 'null' }}</td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $key }}">
                                                        View
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $key }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Title:{{ $property->title }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!--Carousel Gallery-->
                                                                    <div class="carousel-gallery">
                                                                        <div class="swiper-container">
                                                                            <div class="swiper-wrapper">
                                                                                @foreach ($property->images as $image)
                                                                                    <div class="swiper-slide">
                                                                                        <a class="effect-light"
                                                                                            href="{{ asset('storage/' . $image->image) }}"
                                                                                            data-fancybox="gallery">
                                                                                            <div class="image">
                                                                                                <img width="100%"
                                                                                                    height="300"
                                                                                                    style="border-radius: 1.25rem !important;"
                                                                                                    src="{{ asset('storage/' . $image->image) }}"
                                                                                                    class="img-responsive wp-post-image"
                                                                                                    alt=""
                                                                                                    loading="lazy">
                                                                                                <div class="overlay">
                                                                                                    <em
                                                                                                        class="mdi mdi-magnify-plus"></em>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--#Carousel Gallery-->
                                                                    <p class="text-wrap"> <strong
                                                                            class="me-2">Address:</strong>
                                                                        {{ $property->address }}</p>
                                                                    <p class="text-wrap"><strong
                                                                            class="me-2">Phone:</strong>
                                                                        {{ $property->phone }}</p>
                                                                    <p class="text-wrap"> <strong class="me-2">Email:
                                                                        </strong>
                                                                        {{ $property->email }} </p>
                                                                    <p class="text-wrap">
                                                                        <strong class="me-2"> Company
                                                                            Website:
                                                                        </strong> <a
                                                                            href="{{ $property->company_website }}">{{ $property->company_website }}</a>
                                                                    </p>
                                                                    <p class="text-wrap"><strong class="me-2">Promote
                                                                            Website:
                                                                        </strong> <a
                                                                            href="{{ $property->promote_url }}">{{ $property->promote_url }}</a>
                                                                    </p>
                                                                    <p class="text-wrap"><strong
                                                                            class="me-2">Price:</strong>
                                                                        ${{ $property->price }}</p>
                                                                    <p class="text-wrap"><strong
                                                                            class="me-2">Area:</strong>
                                                                        {{ $property->area }}</p>
                                                                    <p class="text-wrap"><strong
                                                                            class="me-2">Beds:</strong>
                                                                        {{ $property->beds }}</p>
                                                                    <p class="text-wrap"><strong
                                                                            class="me-2">Baths:</strong>
                                                                        {{ $property->baths }}</p>
                                                                    <p class="text-wrap"><strong
                                                                            class="me-2">Garages:</strong>
                                                                        {{ $property->garages }}</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($property->access == 'declined')
                                                        <span class="badge bg-danger"> Request Declined</span>
                                                    @elseif ($property->access == 'approved')
                                                        <span class="badge bg-success"> Request Approved</span>
                                                    @else
                                                        <a href="{{ route('admin.property.approved', $property->id) }}"
                                                            class="approver btn-sm">Approve</a>
                                                        <a href="{{ route('admin.property.decline', $property->id) }}"
                                                            class="declined btn-sm">Decline</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center text-muted fst-italic">

                                                No records Available
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
