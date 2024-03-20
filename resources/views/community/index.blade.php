@extends(auth()->user()->hasRole('admin') ? 'admin.layouts.app' : (auth()->user()->hasRole('executive') ? 'executive.layouts.app' : 'member.layouts.app'))
<style>
    .desspri {
        display: flex;
        flex-direction: column;
    }

    .community {
        padding: 20px;
        background: #ffffff 0% 0% no-repeat padding-box;
        box-shadow: 0px 0px 10px #00000033;
        border: 1px solid #00000066;
        border-radius: 30px;
        opacity: 1;
    }

    .community img {
        border-radius: 20px;
    }

    .community .user-manage {
        display: flex;
        align-items: center;
    }

    .commment {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        border-top: 1px solid #858586;
        padding-top: 15px;
    }

    .community .commment .comt {
        display: flex;
        align-items: baseline;
    }

    .community .commment .comt p {
        margin-left: 10px;
        font-size: 20px;
        font-weight: 500;
    }

    .community .commment .comt p span {
        font-size: 14px;
        font-weight: 400;
        position: relative;
        top: 15px;
    }

    .commment .comt img {
        border-radius: 0px;
    }

    .community .commment .comt-time {
        width: 20%;
        float: right;
        text-align: right;
    }

    .commment .comt a {
        color: #000;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Community</h1>
                <p>{{ auth()->user()->name }}, welcome back</p>
                <button type="button btn-sm" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Post
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Community Post</h5>
                                <button type="button" class="btn-close mb-5" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.community.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="container">

                                        <div class="col-12 desspri">
                                            <label for="start_date" class="form-label">Description:</label>
                                            <textarea name="description" id="start_date" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="col-12 ">
                                            <div class="mt-4">
                                                <label for="start_date" class="form-label">Image (Optional):</label>
                                                <input type="file" class="form-control" name="image" accept="image/*"
                                                    id="inputGroupFile01">
                                            </div>
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
                <div class="container">
                    <div class="row">
                        @forelse ($community as $item)
                            <div class="col-lg-8 col-sm-12">
                                <div class="community my-5">
                                    @if ($item->image)
                                        <img width="100%" src="{{ asset('storage/' . $item->image) }}" />
                                    @endif
                                    <div class="user-manage">
                                        @if ($item->user->image)
                                            <img src="{{ asset('storage/' . $item->user->image) }}" />
                                        @endif
                                        <h3>{{ $item->user->name }}</h3>
                                    </div>
                                    <div class="post-content">
                                        <p>
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                    <div class="commment">
                                        <div class="comt">
                                            <img width="3%" src="{{ asset('backend/images/icons/message.svg') }}" />
                                            <a href="{{ route('admin.community.comments', $item->id) }}">
                                                <p>Comment<span>{{ $item->comments->count() }}</span></p>
                                            </a>
                                        </div>
                                        <div class="comt-time">
                                            <p>{{ $item->created_at->diffforhumans() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="lead">There are no posts yet.</p>
                        @endforelse
                        {{-- <div class="col-4"></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
