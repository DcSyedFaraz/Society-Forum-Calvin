@extends('layout.app')

@section('title', 'Woops! 404 Not Found')
@section('description', '')
@section('canonical', config('app.app_url') . Request::path())

@section('content')


    <section class="container mx-auto my-4 px-4">

        {{-- <h1 class="text-primary text-4xl my-4"><strong>About</strong></h1> --}}

        <img class="mx-auto justify-content-between d-flex" style="max-height: 32rem" src="{{ asset('imgs/404-error.svg') }}"
            alt="Not Found">

        <div class="text-center  space-y-2 text-xl md:text-3xl">
            <div class="text-primary"><strong>Woops</strong></div>
            <div class="text-secondary"><strong>This page got lost in conversation</strong></div>
        </div>
        <div class="text-center mt-10">
            <a class="bg-primary-two py-2 px-8 text-white font-semibold rounded-lg shadow-lg border-2 border-white focus:outline-none focus:ring-2 focus:ring-primary-dark focus:ring-opacity-75 transform transition hover:-translate-y-1 cursor-pointer text-center "
                href="{{ route('home') }}">
                Back to Home
            </a>
        </div>
    </section>

@endsection
