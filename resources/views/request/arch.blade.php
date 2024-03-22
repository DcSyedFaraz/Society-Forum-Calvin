@extends(Auth::user()->hasRole('admin') ? 'admin.layouts.app' : 'executive.layouts.app')


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
                    <h3>Artchitectural Requests</h3>
                    {{-- <h3>Artchitectural Requests</h3> --}}
                    <div class="tablemaster" translate="no" data-new-gr-c-s-check-loaded="14.1157.0" data-gr-ext-installed="">
                        <div id="example_wrapper" class="dataTables_wrapper">
                            <div class="dataTables_length" id="example_length">
                            </div>
                            <table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid"
                                aria-describedby="example_info" style="width: 100%;">

                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Name:</th>
                                        <th>Email:</th>
                                        <th>Phone Number:</th>
                                        <th>View:</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @if ($request->count() > 0)
                                        @foreach ($request as $key => $Artchitectural)
                                            <tr class="odd">
                                                {{-- @dd($Artchitectural) --}}
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $Artchitectural->name ?? '' }}</td>
                                                <td>{{ $Artchitectural->email ?? '' }}</td>
                                                <td>{{ $Artchitectural->phone ?? 'null' }}</td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
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
                                                                        Name:{{ $Artchitectural->name }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @if ($Artchitectural->image)
                                                                        <img class="rounded"
                                                                            src="{{ asset('storage/' . $Artchitectural->image) }}"
                                                                            alt="Image" width="100%" height="auto">
                                                                    @endif
                                                                    <p class="mt-3">Phone: {{ $Artchitectural->phone }}
                                                                    </p>
                                                                    <p>Email: {{ $Artchitectural->email }}</p>
                                                                    <p>Request Change:
                                                                        {{ $Artchitectural->requestedchange }}</p>

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
                                                    @if ($Artchitectural->access == 'declined')
                                                        <span class="badge bg-danger"> Request Declined</span>
                                                    @else
                                                        <a href="{{ route('admin.artchitectural.approved', $Artchitectural->id) }}"
                                                            class="approver">Approved</a>
                                                        <a href="{{ route('admin.artchitectural.decline', $Artchitectural->id) }}"
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
                </div>
            </div>
        </div>
    </div>
@endsection
