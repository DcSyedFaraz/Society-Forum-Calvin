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
                <form action="{{ route('admin.about_document.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="document">Choose document for About Us Page</label>
                        <input type="file" class="form-control" name="document" required>
                    </div>
                    <small class="fw-bold">*File Size 4mb or less</small>
                    <button type="submit" class="btn btn-primary mt-3">Upload</button>
                </form>
                <div id="tabler-tables">
                    <h3>User Requests</h3>
                    {{-- <h3>User Requests</h3> --}}
                    <div class="tablemaster" translate="no" data-new-gr-c-s-check-loaded="14.1157.0"
                        data-gr-ext-installed="">
                        <div id="example_wrapper" class="dataTables_wrapper">
                            <div class="dataTables_length" id="example_length">
                            </div>
                            <table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid"
                                aria-describedby="example_info" style="width: 100%;">

                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Name:</th>
                                        <th>Email:</th>
                                        <th>Phone Number:</th>
                                        <th>View:</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($request as $key => $user)
                                        <tr class="odd">
                                            {{-- @dd($user) --}}
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->name ?? '' }}</td>
                                            <td>{{ $user->email ?? '' }}</td>
                                            <td>{{ $user->phone ?? 'null' }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $key }}">
                                                    View
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $key }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Name:{{ $user->name }}</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @if ($user->image)
                                                                    <img class="rounded"
                                                                        src="{{ asset('storage/images/' . $user->image) }}"
                                                                        alt="Image" width="100%" height="auto">
                                                                @endif
                                                                @if ($user->roles->isNotEmpty())
                                                                    <p class="mt-3"><strong class="me-2">Role:</strong>
                                                                        <span
                                                                            class="badge bg-primary text-uppercase">{{ $user->roles->first()->name }}</span>
                                                                    </p>
                                                                @else
                                                                    <p class="mt-3"><strong class="me-2">Role:</strong>
                                                                        <span class="badge bg-secondary text-uppercase">No
                                                                            Role
                                                                            Assigned</span>
                                                                    </p>
                                                                @endif
                                                                <p class="mt-3"><strong class="me-2">User Name:</strong>
                                                                    <span
                                                                        class="badge bg-primary">{{ $user->username }}</span>
                                                                </p>
                                                                @if ($user->member)
                                                                    <div class="user-info">
                                                                        <p class="text-wrap">
                                                                            <strong class="me-2">Position:</strong>
                                                                            <span
                                                                                class="badge text-uppercase bg-success">{{ ucfirst($user->member->position) }}</span>
                                                                        </p>

                                                                        <p class="text-wrap">
                                                                            <strong class="me-2">Address:</strong>
                                                                            {{ $user->member->address }}
                                                                        </p>

                                                                        @if ($user->member->position === 'rent')
                                                                            <!-- Fields specific to Renters -->
                                                                            <p class="text-wrap">
                                                                                <strong class="me-2">Landlord
                                                                                    Address:</strong>
                                                                                {{ $user->member->landlord_address ?? 'N/A' }}
                                                                            </p>
                                                                            <p class="text-wrap">
                                                                                <strong class="me-2">Landlord
                                                                                    Name:</strong>
                                                                                {{ $user->member->landlord_name ?? 'N/A' }}
                                                                            </p>
                                                                            <p class="text-wrap">
                                                                                <strong class="me-2">Landlord Phone
                                                                                    Number:</strong>
                                                                                {{ $user->member->landlord_phone_number ?? 'N/A' }}
                                                                            </p>
                                                                            <p class="text-wrap">
                                                                                <strong class="me-2">Landlord Email
                                                                                    Address:</strong>
                                                                                {{ $user->member->landlord_email_address ?? 'N/A' }}
                                                                            </p>
                                                                        @elseif ($user->member->position === 'owner')
                                                                            <!-- Fields specific to Owners -->
                                                                            <p class="text-wrap">
                                                                                <strong class="me-2">Date of
                                                                                    Purchase:</strong>
                                                                                {{ $user->member->date_of_purchase ?? 'N/A' }}
                                                                            </p>
                                                                            <p class="text-wrap">
                                                                                <strong class="me-2">Park Shadows Property
                                                                                    Address:</strong>
                                                                                {{ $user->member->park_address ?? 'N/A' }}
                                                                            </p>
                                                                        @endif
                                                                    </div>
                                                                @elseif ($user->executive)
                                                                    <p class="text-wrap"><strong class="me-2">Mailing
                                                                            Address:</strong>
                                                                        {{ $user->executive->address ?? 'N/A' }}
                                                                    </p>
                                                                    <p class="text-wrap"><strong class="me-2">Park
                                                                            Address:</strong>
                                                                        {{ $user->executive->parkaddress ?? 'N/A' }}
                                                                    </p>
                                                                    <p class="text-wrap"><strong class="me-2">H.O.A
                                                                            Address:</strong>
                                                                        {{ $user->executive->hoaaddress ?? 'N/A' }}
                                                                    </p>
                                                                    <p class="text-wrap"><strong
                                                                            class="me-2">Designation:</strong>
                                                                        {{ $user->executive->designation ?? 'N/A' }}
                                                                    </p>
                                                                @elseif ($user->agent)
                                                                    <p class="text-wrap"><strong
                                                                            class="me-2">License:</strong>
                                                                        {{ $user->agent->license }}</p>
                                                                    <p class="text-wrap"><strong class="me-2">Company
                                                                            Name:</strong>
                                                                        {{ $user->agent->company_name }}</p>
                                                                    <p class="text-wrap"><strong class="me-2">Physical
                                                                            Address:</strong>
                                                                        {{ $user->agent->physical_address }}</p>
                                                                    <p class="text-wrap"><strong class="me-2">Company
                                                                            Mailing Address:</strong>
                                                                        {{ $user->agent->company_mailing_address }}</p>
                                                                    <p class="text-wrap"><strong class="me-2">Company
                                                                            Phone Number:</strong>
                                                                        {{ $user->agent->company_phone_number }}</p>
                                                                    <p class="text-wrap"><strong class="me-2">Company
                                                                            Email:</strong>
                                                                        {{ $user->agent->company_email }}</p>
                                                                    @if ($user->agent->company_website)
                                                                        <p class="text-wrap"><strong
                                                                                class="me-2">Company
                                                                                Website:</strong> <a
                                                                                href="{{ $user->agent->company_website }}">{{ $user->agent->company_website }}</a>
                                                                        </p>
                                                                    @endif
                                                                @else
                                                                    <p class="text-wrap">No user details available.</p>
                                                                @endif

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
                                                @if ($user->access == 'declined')
                                                    <span class="badge bg-danger"> Request Declined</span>
                                                    <a href="{{ route('admin.User.approved', $user->id) }}"
                                                        class="btn btn-success">Approve</a>
                                                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                        method="POST" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure want to delete this?')"
                                                            type="button" class="btn btn-sm btn-danger"><i
                                                                class="bi bi-trash-fill"></i></button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('admin.User.approved', $user->id) }}"
                                                        class="approver">Approve</a>
                                                    <a href="{{ route('admin.User.decline', $user->id) }}"
                                                        class="declined">Decline</a>
                                                @endif
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted fst-italic">

                                                No records Available
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
