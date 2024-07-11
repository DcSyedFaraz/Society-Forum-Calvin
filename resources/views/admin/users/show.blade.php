@extends('admin.layouts.app')


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">User Details: {{ $user->name }}</h5>
            </div>
            <div class="card-body">
                @if ($user->image)
                    <img class="rounded my-3" src="{{ asset('storage/images/' . $user->image) }}" alt="Image" width="200px"
                        height="auto">
                @endif

                @if ($user->roles->isNotEmpty())
                    <p><strong class="me-2">Role:</strong>
                        <span class="badge bg-primary text-uppercase">{{ $user->roles->first()->name }}</span>
                    </p>
                @else
                    <p><strong class="me-2">Role:</strong>
                        <span class="badge bg-secondary text-uppercase">No Role Assigned</span>
                    </p>
                @endif

                @if ($user->member)
                    <p><strong class="me-2">Position:</strong>
                        <span class="badge text-uppercase bg-success">{{ $user->member->position }}</span>
                    </p>
                    <p><strong class="me-2">Address:</strong>{{ $user->member->address }}</p>
                    <p><strong class="me-2">Date of Purchase:</strong>{{ $user->member->date_of_purchase ?? 'N/A' }}</p>
                    <p><strong class="me-2">Landlord Address:</strong>{{ $user->member->landlord_address ?? 'N/A' }}</p>
                    <p><strong class="me-2">Landlord Name:</strong>{{ $user->member->landlord_name ?? 'N/A' }}</p>
                    <p><strong class="me-2">Landlord Phone
                            Number:</strong>{{ $user->member->landlord_phone_number ?? 'N/A' }}</p>
                    <p><strong class="me-2">Landlord Email
                            Address:</strong>{{ $user->member->landlord_email_address ?? 'N/A' }}</p>
                @elseif ($user->executive)
                    <p><strong class="me-2">Address:</strong>{{ $user->executive->address ?? 'N/A' }}</p>
                    <p><strong class="me-2">Park Address:</strong>{{ $user->executive->parkaddress ?? 'N/A' }}</p>
                    <p><strong class="me-2">H.O.A Address:</strong>{{ $user->executive->hoaaddress ?? 'N/A' }}</p>
                    <p><strong class="me-2">Designation:</strong>{{ $user->executive->designation ?? 'N/A' }}</p>
                @elseif ($user->agent)
                    <p><strong class="me-2">License:</strong>{{ $user->agent->license }}</p>
                    <p><strong class="me-2">Company Name:</strong>{{ $user->agent->company_name }}</p>
                    <p><strong class="me-2">Physical Address:</strong>{{ $user->agent->physical_address }}</p>
                    <p><strong class="me-2">Company Mailing Address:</strong>{{ $user->agent->company_mailing_address }}
                    </p>
                    <p><strong class="me-2">Company Phone Number:</strong>{{ $user->agent->company_phone_number }}</p>
                    <p><strong class="me-2">Company Email:</strong>{{ $user->agent->company_email }}</p>
                    @if ($user->agent->company_website)
                        <p><strong class="me-2">Company Website:</strong> <a
                                href="{{ $user->agent->company_website }}">{{ $user->agent->company_website }}</a></p>
                    @endif
                @else
                    <p>No user details available.</p>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to Users List</a>
            </div>
        </div>
    </div>
@endsection
