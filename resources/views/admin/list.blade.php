@extends('admin.layouts.app')
<style>
    .dataTables_wrapper .dataTables_filter {
        float: left;
        text-align: left;
    }

    a.addbtn img {
        filter: brightness(0) invert(1);
    }

    a.addbtn {
        background-color: #8e7b56;
        padding: 3px 10px;
        border-radius: 50px;
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
                <h1>Listed Property</h1>
                <p>Welcome {{ auth()->user()->name }}</p>

                <h3>
                    Properties List
                    <a class="addbtn" href="#addPropertyModal" data-toggle=""><img width="20px"
                            src="{{ asset('backend/images/icons/user.svg') }}" />
                    </a>
                </h3>
                <div class="tablemaster" translate="no" data-new-gr-c-s-check-loaded="14.1157.0" data-gr-ext-installed="">
                    <div id="example_wrapper" class="dataTables_wrapper">
                        <div id="example_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="" placeholder=""
                                    aria-controls="example" /></label>
                        </div>
                        <table id="example" class=" table">
                            <thead>
                                <tr>
                                    <th>Request #</th>
                                    <th>Created By</th>
                                    <th>Property Price</th>
                                    <th>Location</th>
                                    <th>Email</th>
                                    <th>Images</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @if ($property->count() > 0)
                                <tbody>
                                    @foreach ($property as $properties)
                                        <tr>
                                            <td>{{ $properties->id }}</td>
                                            <td>{{ $properties->user->name }}</td>
                                            <td>{{ $properties->price }}</td>
                                            <td>{{ $properties->address }}</td>
                                            <td>{{ $properties->email }}</td>
                                            <td>
                                                <img class="rounded rounded-2" style="width: 54px;"
                                                    src="{{ asset('storage/' . $properties->image) }}" alt="img">
                                            </td>
                                            <td>
                                                @if ($properties->access === 'approved')
                                                    <span class="badge bg-success">Approved</span>
                                                @elseif ($properties->access === 'declined')
                                                    <span class="badge bg-danger">Declined</span>
                                                @elseif ($properties->status === null)
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                @endif
                                            </td>

                                            <td>


                                                <form action="{{ route('admin.list.delete', $properties->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this item?')">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            @else
                                <tbody>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted fst-italic">

                                            No records Available
                                        </td>
                                    </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
