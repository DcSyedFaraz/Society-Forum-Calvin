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
                    <form action="{{ route('admin.users.bulkAction') }}" method="POST" id="bulk-action-form">
                        @method('POST')
                        @csrf

                        <!-- Bulk Action Buttons -->
                        <div class="d-flex flex-wrap justify-content-end mb-3">
                            <button type="submit" name="action" value="approve"
                                class="btn btn-success bulk-action-btn m-2" disabled>
                                Approve Selected
                            </button>
                            <button type="submit" name="action" value="decline"
                                class="btn btn-warning bulk-action-btn m-2" disabled>
                                Decline Selected
                            </button>
                            <button type="submit" name="action" value="delete" class="btn btn-danger bulk-action-btn m-2"
                                onclick="return confirm('Are you sure you want to delete the selected users?')" disabled>
                                Delete Selected
                            </button>
                        </div>

                        <div class="tablemaster table-responsive" translate="no">
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
                                        @forelse ($request as $key => $user)
                                            <tr class="odd">
                                                <td>
                                                    <input type="checkbox" name="selected_users[]"
                                                        value="{{ $user->id }}">
                                                </td>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $user->name ?? '' }}</td>
                                                <td>{{ $user->email ?? '' }}</td>
                                                <td>{{ $user->phone ?? 'null' }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $key }}">
                                                        View
                                                    </button>
                                                </td>
                                                <td>
                                                    @if ($user->access == 'declined')
                                                        <span class="badge bg-danger">Request Declined</span>
                                                        <a href="{{ route('admin.User.approved', $user->id) }}"
                                                            class="btn btn-success">Approve</a>
                                                        <form action="{{ route('admin.users.destroy', $user->id) }}"
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
                                                        <a href="{{ route('admin.User.approved', $user->id) }}"
                                                            class="approver">Approve</a>
                                                        <a href="{{ route('admin.User.decline', $user->id) }}"
                                                            class="declined">Decline</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted fst-italic">No records
                                                    Available</td>
                                            </tr>
                                        @endforelse
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
    <!-- Select All and Bulk Action JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('select-all');
            const individualCheckboxes = document.querySelectorAll('input[name="selected_users[]"]');
            const bulkActionButtons = document.querySelectorAll('.bulk-action-btn');

            // Function to update the state of bulk action buttons
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
        });
    </script>
@endsection
