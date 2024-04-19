@extends(auth()->user()->hasRole('admin') ? 'admin.layouts.app' : (auth()->user()->hasRole('executive') ? 'executive.layouts.app' : 'member.layouts.app'))
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">


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
                                <p>{!! $comment->body !!}</p>
                                <p class="text-muted">{{ $comment->created_at->diffForHumans() }}
                                    @if (\Auth::user()->hasRole('admin') || $comment->user_id == \Auth::id())
                                        <span><button class="btn btn-sm btn-link p-0 delete-btn"
                                                data-comment-id="{{ $comment->id }}"
                                                id="delete-comment-btn-{{ $comment->id }}">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                            </button></span>
                                    @endif
                                </p>
                                @foreach ($comment->replies as $reply)
                                    <div class="reply ms-3">
                                        <strong>{{ $reply->user->name }}: </strong>
                                        <p>{!! $reply->body !!}</p>
                                        <p class="text-muted">{{ $reply->created_at->diffForHumans() }}
                                            @if (\Auth::user()->hasRole('admin') || $reply->user_id == \Auth::id())
                                                <span><button class="btn btn-sm btn-link p-0 delete-btn"
                                                        data-comment-id="{{ $reply->id }}"
                                                        id="delete-reply-btn-{{ $reply->id }}">
                                                        <i class="fas fa-trash-alt text-danger"></i>
                                                    </button></span>
                                            @endif
                                        </p>
                                    </div>
                                @endforeach
                                <form class="reply ms-3" action="{{ route('comments.reply', $comment->id) }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="taggedUsernames" class="taggedUsernames">

                                    <textarea name="reply" class="form-control summernote"></textarea>
                                    <input type="hidden" value="{{ $id }}" name="community_id" />
                                    <button type="submit" class="btn btn-primary my-2">Reply</button>
                                </form>


                            </div>
                        </div>
                    @endif
                @endforeach


                <!-- Add a form for users to add comments -->
                <h4 class="mb-3">Add a comment:</h4>
                <form method="post" action="{{ route('comments.store') }}">
                    @csrf
                    <input type="hidden" name="taggedUsernames" class="taggedUsernames">

                    <input type="hidden" value="{{ $id }}" name="community_id" />
                    <div class="form-floating mb-3">
                        <textarea name="body" class="form-control summernote" id="body" maxlength="100" style="height: 100px" required></textarea>

                    </div>
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            // Loop through each form
            $('form').each(function(index) {
                let taggedUsernames = []; // Initialize array to store tagged usernames for this form

                $(this).submit(function() {
                    // Update the value of the hidden input field for this form with the tagged usernames
                    $(this).find('.taggedUsernames').val(JSON.stringify(taggedUsernames));
                });

                // Initialize Summernote for the current form
                const $summernote = $(this).find('.summernote');
                const $taggedUsernamesInput = $(this).find('.taggedUsernames');

                if ($summernote.length && $taggedUsernamesInput.length) {
                    $summernote.summernote({
                        height: 200,
                        callbacks: {
                            onChange: function(contents, editable) {
                                // Clear the array on every change
                                // taggedUsernames = [];
                            }
                        },
                        hint: {
                            mentions: typeof @json($users) !== 'undefined' ?
                                @json($users) : [],
                            match: /\B@(\w*)$/,
                            search: function(keyword, callback) {
                                const filteredMentions = $.grep(this.mentions, function(item) {
                                    return item.indexOf(keyword) === 0;
                                });
                                callback(filteredMentions);
                            },
                            content: function(item) {
                                // Push the tagged username into the array
                                taggedUsernames.push(item);
                                // Return the formatted content for display in the editor
                                return `@${item}`;
                            }
                        },
                    });
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteBtns = document.querySelectorAll('.delete-btn');
            deleteBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    console.log('deleteBtns');
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
