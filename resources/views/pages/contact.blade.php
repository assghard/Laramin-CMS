@extends('layouts.master', ['contactLink' => 'active'])

@section('title') Contact | {{ env('APP_NAME') }} @stop

@section('meta')
    <meta name="title" content="" />
    <meta name="description" content="" />

    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:type" content="Website" />
    <meta property="og:url" content="{{ url('/') }}" />

    {{-- @if($page->getMedia('og_image')->first())
        <meta property="og:image" content="{{ url('/') }}{{ $page->getMedia('og_image')->first()->getUrl() }}" />
    @else
        <meta property="og:image" content="{{ asset('img/default.jpg') }}" />
    @endif --}}
@stop

@push('style')
    @if (env('APP_ENV') == 'production')
        <link rel="stylesheet" href="{{ url('/css/subpage-stack.css') }}"/>
    @else
        <link rel="stylesheet" href="{{ mix('/css/subpage-stack.css') }}"/>
    @endif
@endpush

@section('content')
    <div class="container">
        <h1>Contact us</h1>
        
        <div class="row">
            <div class="col-md-6">
                @include('pages.partials.contact-form')
            </div>
            <div class="col-md-6">
                <h2>Company data here</h2>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    @if (env('APP_ENV') == 'production')
        <script src="{{ url('/js/subpage-stack.js') }}"></script>
    @else
        <script src="{{ mix('/js/subpage-stack.js') }}"></script> 
    @endif
@endpush
