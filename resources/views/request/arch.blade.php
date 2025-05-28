@extends(Auth::user()->hasRole('admin') ? 'admin.layouts.app' : 'executive.layouts.app')


<style>
    .modal-content .modal-body p {
        width: 100% !important;
        text-wrap: wrap;
    }

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

    .declined {
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
                <!-- <p>Welcome {{ auth()->user()->name }}</p> -->
                <div id="tabler-tables">
                    <h3>Artchitectural Requests</h3>
                    {{-- <h3>Artchitectural Requests</h3> --}}

                    <form action="{{ route('admin.architects.bulk-action') }}" method="POST" id="req-action-form">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="decline_reason" id="decline-reason" value="Incomplete Information">

                        <!-- Bulk Action Buttons -->
                        <div class="d-flex flex-wrap justify-content-end mb-3">
                            <button type="submit" name="action" value="approve"
                                class="btn btn-success req-action-btn m-2" disabled>
                                Approve Selected
                            </button>
                            <div class="dropdown d-inline-block m-2">
                                <button class="btn btn-warning dropdown-toggle req-action-btn" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" disabled>
                                    Decline Selected
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <h6 class="dropdown-header">Select Reason:</h6>
                                    </li>
                                    <li><button type="submit" name="action" value="decline" class="dropdown-item"
                                            data-reason="Against the Policy">Against the Policy</button></li>
                                    <li><button type="submit" name="action" value="decline" class="dropdown-item"
                                            data-reason="Incomplete Information">Incomplete Information</button></li>
                                </ul>
                            </div>
                            <button type="submit" name="action" value="delete" class="btn btn-danger req-action-btn m-2"
                                onclick="return confirm('Are you sure you want to delete the selected users?')" disabled>
                                Delete Selected
                            </button>
                        </div>


                        <div class="tablemaster" translate="no" data-new-gr-c-s-check-loaded="14.1157.0"
                            data-gr-ext-installed="">
                            <div id="example_wrapper" class="dataTables_wrapper">
                                <div class="dataTables_length" id="example_length">
                                </div>
                                <table id="example" class="display dataTable" cellspacing="0" width="100%"
                                    role="grid" aria-describedby="example_info" style="width: 100%;">

                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>
                                            <th>S.N.</th>
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
                                                    <td>
                                                        <input type="checkbox" name="selected_req[]"
                                                            value="{{ $Artchitectural->id }}">
                                                    </td>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $Artchitectural->name ?? '' }}</td>
                                                    <td>{{ $Artchitectural->email ?? '' }}</td>
                                                    <td>{{ $Artchitectural->phone ?? 'null' }}</td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary"
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
                                                                            Name:{{ $Artchitectural->name }}</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        @if ($Artchitectural->image)
                                                                            <img class="rounded"
                                                                                src="{{ asset('storage/' . $Artchitectural->image) }}"
                                                                                alt="Image" width="100%"
                                                                                height="auto">
                                                                        @endif
                                                                        <p class="mt-3 text-wrap">Phone:
                                                                            {{ $Artchitectural->phone }}
                                                                        </p>
                                                                        <p class=" text-wrap">Email:
                                                                            {{ $Artchitectural->email }}</p>
                                                                        <p class="text-wrap">Request Change:
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
                                                    {{-- <td>
                                                        @if ($Artchitectural->access == 'declined')
                                                            <span class="badge bg-danger"> Request Declined</span>
                                                        @elseif ($Artchitectural->access == 'approved')
                                                            <span class="badge bg-success"> Request Approved</span>
                                                        @else
                                                            <a href="{{ route('admin.artchitectural.approved', $Artchitectural->id) }}"
                                                                class="approver">Approve</a>
                                                            <a href="{{ route('admin.artchitectural.decline', $Artchitectural->id) }}"
                                                                class="declined">Decline</a>
                                                        @endif
                                                    </td> --}}
                                                     <td>
                                                    @if ($Artchitectural->access == 'declined')
                                                        <span class="badge bg-danger">Request Declined</span>
                                                        <a href="{{ route('admin.artchitectural.approved', $Artchitectural->id) }}"
                                                            class="btn btn-success">Approve</a>
                                                        <form action="{{ route('admin.artchitectural.decline', $Artchitectural->id) }}"
                                                            class="individual-action-form" method="POST"
                                                            style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure want to delete this?')"
                                                                class="btn btn-sm btn-danger"><i
                                                                    class="bi bi-trash-fill"></i></button>
                                                        </form>
                                                    @else
                                                        <a href="{{ route('admin.artchitectural.approved', $Artchitectural->id) }}"
                                                            class="approver">Approve</a>
                                                        <form action="{{ route('admin.artchitectural.decline', $Artchitectural->id) }}"
                                                            method="POST" class="individual-decline-form d-inline">
                                                            @csrf
                                                            <input type="hidden" name="decline_reason"
                                                                class="decline-reason-input" value="">
                                                            <button type="submit" class="declined">Decline</button>
                                                        </form>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- Select All and request Action JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('select-all');
            const individualCheckboxes = document.querySelectorAll('input[name="selected_req[]"]');
            const bulkActionButtons = document.querySelectorAll('.req-action-btn');

            const declineButtons = document.querySelectorAll('.dropdown-item[data-reason]');
            const reasonInput = document.getElementById('decline-reason');


            declineButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    reasonInput.value = this.getAttribute('data-reason');
                });
            });

            // Function to update the state of request action buttons
            const updateBulkActionButtons = () => {
                const anyChecked = Array.from(individualCheckboxes).some(checkbox => checkbox.checked);
                bulkActionButtons.forEach(button => {
                    button.disabled = !anyChecked;
                });
            };

            // Initialize the button state on page load
            updateBulkActionButtons();

            // Event listener for the "Select All" checkbox
            selectAllCheckbox.addEventListener('change', function(e) {
                individualCheckboxes.forEach(checkbox => {
                    checkbox.checked = e.target.checked;
                });
                updateBulkActionButtons();
            });

            // Event listeners for individual checkboxes
            individualCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // If any checkbox is unchecked, uncheck the "Select All" checkbox
                    if (!this.checked) {
                        selectAllCheckbox.checked = false;
                    } else {
                        // If all checkboxes are checked, check the "Select All" checkbox
                        const allChecked = Array.from(individualCheckboxes).every(cb => cb.checked);
                        if (allChecked) {
                            selectAllCheckbox.checked = true;
                        }
                    }
                    updateBulkActionButtons();
                });
            });

            // Prompt for individual decline reason
            document.querySelectorAll('.individual-decline-form').forEach(form => {
                const btn = form.querySelector('button.declined');
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const choice = prompt(
                        "Select decline reason:\n" +
                        "1) Against the Policy\n" +
                        "2) Incomplete Information\n\n" +
                        "Enter 1 or 2:"
                    );
                    if (choice === '1' || choice === '2') {
                        form.querySelector('.decline-reason-input').value =
                            choice === '1' ?
                            'Against the Policy' :
                            'Incomplete Information';
                        form.submit();
                    }
                });
            });

        });
    </script>
@endsection
