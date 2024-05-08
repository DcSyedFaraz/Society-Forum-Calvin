@extends(auth()->user()->hasRole('executive') ? 'executive.layouts.app' : (auth()->user()->hasRole('admin') ? 'admin.layouts.app' : (auth()->user()->hasRole('member') ? 'member.layouts.app' : 'default.layouts.app')))


@section('content')
    <section class="content">
        @if ($file == 'lostfound')
            <p class="text-danger"><b>Please email <a
                        href="mailto:parkshadowshomeowners@gmail.com">parkshadowshomeowners@gmail.com</a> if you would like
                    to
                    post something to the Lost & Found Section.</b></p>
        @endif

        <iframe src="/filemanager?type={{ $file }}" id="filemanager"
            style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>

    </section>
@endsection
