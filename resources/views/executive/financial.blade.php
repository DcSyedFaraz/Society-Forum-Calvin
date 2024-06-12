@extends(auth()->user()->hasRole('executive') ? 'executive.layouts.app' : 'admin.layouts.app')

@section('content')
    <section class="content">
        <p class="fw-bold">
            To open a file click preview and then the image to expand.
        </p>
        <iframe src="/filemanager?type={{ $file }}" id="filemanager"
            style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>

    </section>
@endsection
