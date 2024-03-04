@extends('executive.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <img width="20%" src="{{ asset('backend/images/logo-icon') }}.png">
                <br><br>
                <h1
                    style="font: normal normal 800 33px/33px Montserrat;
                letter-spacing: -0.82px;
                color: #432D00;
                text-transform: uppercase;
                opacity: 1;	">
                    Welcome Executive</h1>
                <br>
                <p style="width: 70%; margin: 0px auto;">Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                    1500s, when an unknown printer took a galley of type and scrambled it to make a type
                    specimen book. It has survived not only five centuries, but also the leap into electronic
                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </div>
    </div>
@endsection
