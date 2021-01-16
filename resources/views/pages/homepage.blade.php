@extends('layouts.master', ['homepageLink' => 'active'])

@section('title'){{ env('APP_NAME') }} @stop

@section('meta')
    <meta name="title" content="{{ $page->meta_title }}" />
    <meta name="description" content="{{ $page->meta_description }}" />

    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="og:title" content="{{ $page->og_title ?? $page->meta_title }}" />
    <meta property="og:description" content="{{ $page->og_description ?? $page->meta_description }}" />
    <meta property="og:type" content="{{ $page->og_type ?? 'Article' }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    {{-- <meta property="og:image" content="{{ asset('img/logo.jpg') }}" /> --}}
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
          "description": "{{ $page->og_description ?? $page->meta_description }}"
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
        <h1 class="center-text">
            {{ $page->title }}
        </h1>
        
        {!! $page->body !!}
    </div>
@stop

@push('scripts')
    @if (env('APP_ENV') == 'production')
        <script src="{{ url('/js/homepage-stack.js') }}"></script>  
    @else
        <script src="{{ mix('/js/homepage-stack.js') }}"></script>  
    @endif
@endpush
