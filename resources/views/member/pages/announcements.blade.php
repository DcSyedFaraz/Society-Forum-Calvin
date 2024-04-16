@extends(auth()->user()->hasRole('admin') ? 'admin.layouts.app' : (auth()->user()->hasRole('executive') ? 'executive.layouts.app' : 'member.layouts.app'))

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
@endsection
<style>
    .desspri {
        display: flex;
        flex-direction: column;
    }
</style>
@section('content')
    <div class="container">


        <div class="row">
            <div class="col-12">
                <h1>Announcements</h1>
                {{-- @dd(auth()->user()->unreadnotifications) --}}

                @if (auth()->user()->hasRole('admin'))
                    <!-- Button trigger modal -->
                    <button type="button btn-sm" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Announcement
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Announcement Form</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.announcements.save') }}" method="post">
                                        @csrf
                                        <div class="container">
                                            <div class="col-12">
                                                <label for="title" class="form-label">Title:</label>
                                                <input type="text" name="title" required class="form-control"
                                                    id="title">
                                            </div>
                                            <br>
                                            <div class="col-12 desspri">
                                                <label for="start_date" class="form-label">Description:</label>
                                                <textarea name="description" class="summernote" id="start_date" cols="30" rows="10"></textarea>
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
                @endif
                @foreach ($announcements as $announcement)
                    <div class="announce">
                        <p><span>{{ $announcement->created_at->diffforhumans() }}</span></p>
                        <h3>{{ $announcement->title }}</h3>
                        <p>{!! $announcement->description !!}</p>
                        @if (auth()->user()->hasRole('admin'))
                            <div class="announcement-actions">
                                <a href="#">

                                    <i class="bi bi-trash text-danger fw"
                                        data-announcement-id="{{ $announcement->id }}"></i>
                                </a>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (auth()->user()->hasRole('admin'))
        <script>
            $('.announcement-actions .fw').click(function(e) {
                e.preventDefault();
                var id = $(this).data('announcement-id');
                Swal.fire({
                    icon: 'warning',
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('admin.announcement.delete', ['announcement' => ':id']) }}'
                                .replace(':id', id),
                            type: 'DELETE',
                            data: {
                                _token: $('input[name="_token"]').val()
                            },
                            success: function(response) {
                                location.reload();
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                console.log(xhr, textStatus, errorThrown);
                            }
                        });
                    }
                });
            });
        </script>
    @endif
@endsection
