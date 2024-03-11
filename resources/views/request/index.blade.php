@extends('admin.layouts.app')
@section('content')
<section class="content mt-5">
    <div class="container">
        <div class="col-12">

            <div class="card">


                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Property Requests</h3>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-striped table-hover text-sm">
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
                                                <th>Full name:</th>
                                                <th>Email:</th>
                                                <th>Address:</th>
                                                <th>Phone Number:</th>
                                                <th>Voting Status:</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($request)
                                                @foreach ($request as $key => $user)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $user->name ?? '' }}</td>
                                                        <td>{{ $user->email ?? '' }}</td>
                                                        <td>{{ $user->address ?? 'null' }}</td>
                                                        <td>{{ $user->phone ?? 'null' }}</td>
                                                        <td>
                                                            @if ($user->status === 'voting')
                                                                <span class="badge bg-success">Voting</span>
                                                            @elseif ($user->status === 'non-voting')
                                                                <span class="badge bg-warning">Non-Voting</span>
                                                            @else
                                                                <span class="badge bg-secondary">Unknown</span>
                                                            @endif
                                                        </td>
                                                        <td class="d-flex">
                                                            @if ($user->access == 'declined')
                                                                <span class="badge bg-danger"> Request Declined</span>
                                                            @else
                                                                <a href="{{ route('admin.property.approved', $user->id) }}"
                                                                    class="btn btn-sm btn-success">Approved</a>
                                                                <form action="{{ route('admin.property.decline', $user->id) }}" method="POST"
                                                                    class="d-inline mx-1">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-danger dltBtn">Declined</button>
                                                                </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</section>
@endsection
