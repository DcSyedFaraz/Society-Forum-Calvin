@extends(auth()->user()->hasRole('admin') ? 'admin.layouts.app' : (auth()->user()->hasRole('executive') ? 'executive.layouts.app' : 'member.layouts.app'))
<style>
    .user-img {
        width: 38px;
        height: 38px;
        padding: 0px;
        border-radius: 50%;
    }

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

    .btn-a {
        background-color: #8e7b56;
        border-color: #8e7b56;
        color: #fff;
        width: 100px;
        padding: 0 !important;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 31px !important;
    }

    .btn-div {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-a:hover {
        border: 1px solid#8e7b56 !important;
        background: transparent;
        color: #8e7b56;
        transition: 0.3s;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Community Forum</h1>
                <p class="text-danger">* Remember: All comments and posts are public. Please refer to the <a target="blank" class="text-reset text-decoration-underline"
                        href="{{ route('guidelines') }}">community guidelines.</a></p>
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
                                <form action="{{ route('community.store') }}" method="post" enctype="multipart/form-data">
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
                                    <div class="user-manage mt-2">
                                        @if ($item->user->image)
                                            <img class="user-img me-2" width="40px"
                                                src="{{ asset('storage/images/' . $item->user->image) }}" />
                                        @endif
                                        <h3 class="my-auto">{{ $item->user->name }}</h3>
                                    </div>
                                    <div class="post-content">
                                        <p>
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                    <div class="commment">
                                        <div class="comt">
                                            <img width="3%" src="{{ asset('backend/images/icons/message.svg') }}" />
                                            <a href="{{ route('community.comments', $item->id) }}">
                                                <p>Comment<span>{{ $item->comments->count() }}</span></p>
                                            </a>
                                        </div>
                                        <div class="btn-div">
                                            @if (\Auth::id() == $item->user_id)
                                                {{-- <button class="btn-a">Update</button> --}}
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn-a" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $item->id }}">
                                                    Update
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ route('community.update', $item->id) }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editModalLabel">Edit
                                                                        Community Post</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <div class="container">
                                                                        <div class="col-12 desspri">
                                                                            <label for="description"
                                                                                class="form-label">Description:</label>
                                                                            <textarea name="description" id="description" cols="30" rows="10">{{ $item->description }}</textarea>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="mt-4">
                                                                                <label for="image"
                                                                                    class="form-label">Image
                                                                                    (Optional)
                                                                                    :</label>
                                                                                <input type="file" class="form-control"
                                                                                    name="image" accept="image/*">
                                                                                @if ($item->image)
                                                                                    <img class="my-3"
                                                                                        src="{{ asset('storage/' . $item->image) }}"
                                                                                        alt="Image Preview"
                                                                                        style="max-width: 141px; height: auto;">
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if (\Auth::user()->hasRole('admin') || \Auth::id() == $item->user_id)
                                                <button class="btn-a delete-btn"
                                                    data-community-id="{{ $item->id }}">Delete</button>
                                            @endif
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
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteBtns = document.querySelectorAll('.delete-btn');

            deleteBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const communityId = this.dataset.communityId;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this community post!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const form = document.createElement('form');
                            form.method =
                                'POST'; // Change method to POST for Laravel's method spoofing
                            form.action =
                                `{{ route('community.destroy', '') }}/${communityId}`;
                            form.style.display = 'none'; // Hide the form

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

                            // Remove the form from the DOM after submission
                            document.body.removeChild(form);
                        }
                    });
                });
            });
        });
    </script>
@endsection
