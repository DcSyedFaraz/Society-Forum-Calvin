@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Community</h1>
                <p>Hello Cuong, welcome back</p>
                <div class="card">
                    <div class="card-body">
                        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
                                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <img src="{{ asset('backend/images/bg-comm.png') }}" class="d-block w-100"
                                        alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>WORK PROFESSIONALLY AND INTELLIGENTLY</h5>
                                        <p>Creating A New Project Is Easy With Tools</p>
                                        <a href="index.html" aria-expanded="true">
                                            <div class="menu-title">Create New Project</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="{{ asset('backend/images/bg-comm.png') }}" class="d-block w-100"
                                        alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>WORK PROFESSIONALLY AND INTELLIGENTLY</h5>
                                        <p>Creating A New Project Is Easy With Tools</p>
                                        <a href="index.html" aria-expanded="true">
                                            <div class="menu-title">Create New Project</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('backend/images/bg-comm.png') }}" class="d-block w-100"
                                        alt="...">
                                    <div class="carousel-caption d-none d-md-block text-left">
                                        <h5>WORK PROFESSIONALLY AND INTELLIGENTLY</h5>
                                        <p>Creating A New Project Is Easy With Tools</p>
                                        <a href="index.html" aria-expanded="true">
                                            <div class="menu-title">Create New Project</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleDark" role="button"
                                data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleDark" role="button"
                                data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <h3>Team Members:</h3>

                <div class="tablemaster" translate="no" data-new-gr-c-s-check-loaded="14.1157.0" data-gr-ext-installed="">
                    <div id="example_wrapper" class="dataTables_wrapper">
                        <div class="dataTables_length" id="example_length"><label>Show <select name="example_length"
                                    aria-controls="example" class="">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label></div>
                        <div id="example_filter" class="dataTables_filter"><label>Search:<input type="search"
                                    class="" placeholder="" aria-controls="example"></label></div>
                        <table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid"
                            aria-describedby="example_info" style="width: 100%;">

                            <thead>
                                <tr>
                                    <th>Team</th>
                                    <th>Location</th>
                                    <th>Members</th>
                                    <th>Settings</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr role="row" class="odd">
                                    <td>Lorem Ipsum</td>
                                    <td>Garden Lane Mountain, GA 01</td>
                                    <td>
                                    <ul class="membersss">
                                        <li><img src="{{ asset('backend/images/avatars/ava (1).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (2).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (3).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (4).png') }}"></li>

                                    </ul>
                                </td>
                                    <td>...</td>
                                </tr>
                                <tr role="row" class="even">
                                    <td>Lorem Ipsum</td>
                                    <td>Garden Lane Mountain, GA 01</td>
                                    <td>
                                    <ul class="membersss">
                                        <li><img src="{{ asset('backend/images/avatars/ava (1).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (2).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (3).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (4).png') }}"></li>

                                    </ul>
                                </td>
                                    <td>...</td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td>Lorem Ipsum</td>
                                    <td>Garden Lane Mountain, GA 01</td>
                                    <td>
                                    <ul class="membersss">
                                        <li><img src="{{ asset('backend/images/avatars/ava (1).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (2).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (3).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (4).png') }}"></li>

                                    </ul>
                                </td>
                                    <td>...</td>
                                </tr>
                                <tr role="row" class="even">
                                    <td>Lorem Ipsum</td>
                                    <td>Garden Lane Mountain, GA 01</td>
                                    <td>
                                    <ul class="membersss">
                                        <li><img src="{{ asset('backend/images/avatars/ava (1).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (2).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (3).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (4).png') }}"></li>

                                    </ul>
                                </td>
                                    <td>...</td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td>Lorem Ipsum</td>
                                    <td>Garden Lane Mountain, GA 01</td>
                                    <td>
                                    <ul class="membersss">
                                        <li><img src="{{ asset('backend/images/avatars/ava (1).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (2).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (3).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (4).png') }}"></li>

                                    </ul>
                                </td>
                                    <td>...</td>
                                </tr>
                                <tr role="row" class="even">
                                    <td>Lorem Ipsum</td>
                                    <td>Garden Lane Mountain, GA 01</td>
                                    <td>
                                    <ul class="membersss">
                                        <li><img src="{{ asset('backend/images/avatars/ava (1).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (2).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (3).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (4).png') }}"></li>

                                    </ul>
                                </td>
                                    <td>...</td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td>Lorem Ipsum</td>
                                    <td>Garden Lane Mountain, GA 01</td>
                                    <td>
                                    <ul class="membersss">
                                        <li><img src="{{ asset('backend/images/avatars/ava (1).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (2).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (3).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (4).png') }}"></li>

                                    </ul>
                                </td>
                                    <td>...</td>
                                </tr>
                                <tr role="row" class="even">
                                    <td>Lorem Ipsum</td>
                                    <td>Garden Lane Mountain, GA 01</td>
                                    <td>
                                    <ul class="membersss">
                                        <li><img src="{{ asset('backend/images/avatars/ava (1).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (2).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (3).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (4).png') }}"></li>

                                    </ul>
                                </td>
                                    <td>...</td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td>Lorem Ipsum</td>
                                    <td>Garden Lane Mountain, GA 01</td>
                                    <td>
                                    <ul class="membersss">
                                        <li><img src="{{ asset('backend/images/avatars/ava (1).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (2).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (3).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (4).png') }}"></li>

                                    </ul>
                                </td>
                                    <td>...</td>
                                </tr>
                                <tr role="row" class="even">
                                    <td>Lorem Ipsum</td>
                                    <td>Garden Lane Mountain, GA 01</td>
                                    <td>
                                    <ul class="membersss">
                                        <li><img src="{{ asset('backend/images/avatars/ava (1).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (2).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (3).png') }}"></li>
                                        <li><img src="{{ asset('backend/images/avatars/ava (4).png') }}"></li>

                                    </ul>
                                </td>
                                    <td>...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
