@extends(auth()->user()->hasRole('admin') ? 'admin.layouts.app' : (auth()->user()->hasRole('executive') ? 'executive.layouts.app' : 'member.layouts.app'))
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Display community options -->
                <h4 class="mb-3">Comments:</h4>
                @foreach ($comments as $comment)
                    @if (!auth()->user()->hasRole('member') || $comment->user_id === auth()->user()->id)
                        <div class="card mb-3">
                            <div class="card-body">
                                <strong>{{ $comment->user->name }}: </strong>
                                <p>{{ $comment->body }}</p>
                                <p class="text-muted">{{ $comment->created_at->diffForHumans() }}
                                    @if (\Auth::user()->hasRole('admin') || $comment->user_id == \Auth::id())
                                        <span><button
                                                class="btn btn-sm btn-link p-0 delete-btn" data-comment-id="{{ $comment->id }}" id="delete-comment-btn-{{ $comment->id }}">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                            </button></span>
                                    @endif
                                    </p>

                            </div>
                        </div>
                    @endif
                @endforeach


                <!-- Add a form for users to add comments -->
                <h4 class="mb-3">Add a comment:</h4>
                <form method="post" action="{{ route('comments.store') }}">
                    @csrf
                    <input type="hidden" value="{{ $id }}" name="community_id" />
                    <div class="form-floating mb-3">
                        <textarea name="body" class="form-control" id="floatingTextarea" maxlength="100" style="height: 100px" required></textarea>
                        <label for="floatingTextarea">Comment</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section ('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteBtns = document.querySelectorAll('.delete-btn');

            deleteBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const commentId = this.dataset.commentId;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this comment!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const form = document.createElement('form');
                            form.method =
                            'POST';
                            form.action =
                                `{{ route('comment.destroy', '') }}/${commentId}`;
                            form.style.display = 'none';

                            const csrfTokenInput = document.createElement('input');
                            csrfTokenInput.type = 'hidden';
                            csrfTokenInput.name = '_token';
                            csrfTokenInput.value = '{{ csrf_token() }}';
                            form.appendChild(csrfTokenInput);

                            const methodInput = document.createElement('input');
                            methodInput.type = 'hidden';
                            methodInput.name = '_method';
                            methodInput.value = 'DELETE';
                            form.appendChild(methodInput);

                            document.body.appendChild(form);
                            form.submit();

                            document.body.removeChild(form);
                        }
                    });
                });
            });
        });
    </script>
@endsection
