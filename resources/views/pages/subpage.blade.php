@extends('layouts.master', ['subpageLink' => 'active'])

@section('title') {{ $page->title }} | {{ env('APP_NAME') }} @stop

@section('meta')
    <meta name="title" content="{{ $page->meta_title }}" />
    <meta name="description" content="{{ $page->meta_description }}" />

    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="og:title" content="{{ $page->og_title ?? $page->meta_title }}" />
    <meta property="og:description" content="{{ $page->og_description ?? $page->meta_description }}" />
    <meta property="og:type" content="{{ $page->og_type ?? 'Article' }}" />
    <meta property="og:url" content="{{ url('/') }}" />

    {{-- @if($page->getMedia('og_image')->first())
        <meta property="og:image" content="{{ url('/') }}{{ $page->getMedia('og_image')->first()->getUrl() }}" />
    @else
        <meta property="og:image" content="{{ asset('img/default.jpg') }}" />
    @endif --}}
@stop

@push('style')
    <link rel="stylesheet" href="{{ mix('/css/subpage-stack.css') }}" />
@endpush

@section('content')
    <div class="container">
        <h1>{{ $page->title }}</h1>
        {!! $page->body !!}
    </div>
@stop

@push('scripts')
    <script src="{{ mix('/js/subpage-stack.js') }}"></script>
@endpush
