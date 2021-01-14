@extends('layouts.master', ['homepageLink' => 'active'])

@section('title')Homepage | {{ env('APP_NAME') }} @stop

@section('meta')
    <meta name="title" content="Meta title - {{ env('APP_NAME') }}" />
    <meta name="description" content="Meta description - {{ env('APP_NAME') }}" />

    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="og:title" content="{{ env('APP_NAME') }}" />
    <meta property="og:description" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:image" content="{{ asset('img/logo.jpg') }}" />
    {{-- <link rel="amphtml" href="/amp/index.html" /> --}}

    <script type="application/ld+json">
        {
          "@context": "https://schema.org/",
          "@type": "WebSite",
          "name": "{{ env('APP_NAME') }}",
          "url": "{{ url('/') }}",
          "image": [
            "{{ asset('img/logo.jpg') }}"
           ],
          "description": ""
        }
    </script>
@stop

@push('style')
    @if (env('APP_ENV') == 'production')
        <link rel="stylesheet" href="{{ url('/css/homepage-stack.css') }}"/>
    @else
        <link rel="stylesheet" href="{{ mix('/css/homepage-stack.css') }}"/>
    @endif
@endpush

@section('content')
    <div class="container">
        <h1 class="lead-text center-text">
            {{ env('APP_NAME') }}
        </h1>
        
        Homepage content
    </div>
@stop

@push('scripts')
    @if (env('APP_ENV') == 'production')
        <script src="{{ url('/js/homepage-stack.js') }}"></script>  
    @else
        <script src="{{ mix('/js/homepage-stack.js') }}"></script>  
    @endif
@endpush
