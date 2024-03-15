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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- <p>Hello Cuong, welcome back</p> -->
                <div id="tabler-tables">
                    <h3>Property Requests</h3>
                    {{-- <h3>User Requests</h3> --}}
                    <div class="tablemaster" translate="no" data-new-gr-c-s-check-loaded="14.1157.0" data-gr-ext-installed="">
                        <div id="example_wrapper" class="dataTables_wrapper">
                            <div class="dataTables_length" id="example_length">
                            </div>
                            <table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid"
                                aria-describedby="example_info" style="width: 100%;">

                                <thead>
                                    <tr>
                                        <th>S.N</th>
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
                                        @foreach ($request as $key => $user)
                                            <tr class="odd">
                                                {{-- @dd($user) --}}
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $user->title ?? '' }}</td>
                                                <td>{{ $user->email ?? '' }}</td>
                                                <td>{{ $user->address ?? 'null' }}</td>
                                                <td>{{ $user->phone ?? 'null' }}</td>
                                                <td><a class="view" href="#popup1">View</a></td>
                                                <td>
                                                    @if ($user->access == 'declined')
                                                        <span class="badge bg-danger"> Request Declined</span>
                                                    @else
                                                        <a href="{{ route('admin.property.approved', $user->id) }}"
                                                            class="approver">Approved</a>
                                                        <a href="{{ route('admin.property.decline', $user->id) }}"
                                                            class="declined">Declined</a>
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
                    <div id="popup1" class="overlay">
                        <div class="popup">

                            <a class="close" href="#">&times;</a>
                            <form>
                                <label>Name Of Homeowner</label>
                                <input name="namehomeowner" type="text" placeholder="John Doe">
                                <label>Phone Number Of Homeowner</label>
                                <input name="phonehomeowner" type="tel" placeholder="+1 000 0000 0000">
                                <label>Email Of Homeowner</label>
                                <input name="emailhomeowner" type="email" placeholder="Tonynguyen@example.com">
                                <label>Requested Change</label>
                                <input name="requestchanges" type="text" placeholder="Type Here">
                                <label>Upload Image/Sketch</label>
                                <input name="Uploadfile" type="file" id="myFile" name="filename">
                                <button type="button">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
