@extends(auth()->user()->hasRole('executive') ? 'executive.layouts.app' :
          (auth()->user()->hasRole('admin') ? 'admin.layouts.app' :
          (auth()->user()->hasRole('member') ? 'member.layouts.app' : 'default.layouts.app')))


@section('content')
    <section class="content">

        <iframe src="/filemanager?type={{ $file }}" id="filemanager"
            style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>

    </section>
@endsection
