@extends('admin.layouts.app')
<style>
    .desspri {
        display: flex;
        flex-direction: column;
    }
</style>
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Floor Plan</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">

                            <div class="card-header">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    New Plan
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Floor Plan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.floor_plans.store') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="container">

                                                        <div class="col-12 ">
                                                            <div class="">
                                                                <label for="start_date" class="form-label">Image:</label>
                                                                <input type="file" class="form-control" name="image"
                                                                    accept="image/*" id="inputGroupFile01">
                                                                <small class="fw-bold">*File Size 4mb or less</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 desspri mt-4">
                                                            <label for="start_date" class="form-label">Caption
                                                                (Optional):</label>
                                                            <textarea name="caption" id="start_date" cols="30" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image Name</th>
                                            <th>Caption</th>
                                            <th width="560px">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($data)
                                            @foreach ($data as $key => $gallery)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $gallery->name }}</td>
                                                    <td
                                                        class="@if (!$gallery->caption) text-muted fst-italic @endif">
                                                        {{ $gallery->caption ?? 'not provided' }}</td>

                                                        <td>
                                                        <button type="button" class="btn btn-warning edit-caption-btn"
                                                            data-bs-toggle="modal" data-bs-target="#editCaptionModal"
                                                            data-id="{{ $gallery->id }}"
                                                            data-caption="{{ $gallery->caption }}">
                                                            Edit
                                                        </button>
                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['admin.floor_plans.destroy', $gallery->id],
                                                            'style' => 'display:inline',
                                                            'onsubmit' => 'return confirm("Are you sure you want to delete this Floor Plan?");',
                                                        ]) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- Edit Caption Modal -->
    <div class="modal fade" id="editCaptionModal" tabindex="-1" aria-labelledby="editCaptionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCaptionModalLabel">Edit Caption</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCaptionForm" action="{{ route('admin.floor_plans.updateCaption') }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="editCaptionId">
                        <div class="col-12 desspri mt-4">
                            <label for="edit_caption" class="form-label">Caption:</label>
                            <textarea name="caption" id="edit_caption" cols="30" rows="10"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editCaptionModal = document.getElementById('editCaptionModal');
            editCaptionModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var caption = button.getAttribute('data-caption');

                var modalTitle = editCaptionModal.querySelector('.modal-title');
                var captionInput = editCaptionModal.querySelector('#edit_caption');
                var idInput = editCaptionModal.querySelector('#editCaptionId');

                modalTitle.textContent = 'Edit Caption for ' + id;
                captionInput.value = caption;
                idInput.value = id;
            });
        });
    </script>
@endsection
