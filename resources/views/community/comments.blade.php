@extends(auth()->user()->hasRole('admin') ? 'admin.layouts.app' : (auth()->user()->hasRole('executive') ? 'executive.layouts.app' : 'member.layouts.app'))
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Display community options -->
                <h4 class="mb-3">Comments:</h4>
                @foreach ($community->comments as $comment)
                    @if (!auth()->user()->hasRole('member') || $comment->user_id === auth()->user()->id)
                        <div class="card mb-3">
                            <div class="card-body">
                                <strong>{{ $comment->user->name }}:</strong>
                                <p>{{ $comment->body }}</p>
                                <p class="text-muted">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach


                <!-- Add a form for users to add comments -->
                <h4 class="mb-3">Add a comment:</h4>
                <form method="post" action="{{ route('admin.comments.store') }}">
                    @csrf
                    <input type="hidden" value="{{ $community->id }}" name="community_id"/>
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
