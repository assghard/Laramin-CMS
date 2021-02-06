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
    @if (!empty($page->getMainImage()))
        <meta property="og:image" content="{{ $page->getMainImage()->getFullUrl('thumb') }}" />
    @endif

    <script type="application/ld+json">
        {
        "@context": "http://schema.org/",
        "@type": "NewsArticle",
        "headline": "{{ $page->title }}",
        "datePublished": "{{ $page->created_at->format('Y-m-d') }}",
        "description": "{{ $page->meta_description }}",
        "image": {
            "@type": "ImageObject",
            "url": "{{ (!empty($page->getMainImage())) ?? $page->getMainImage()->getFullUrl('thumb') }}"
        },
        "author": "{{ env('APP_NAME') }}",
        "publisher": {
            "@type": "Organization",
            "name": "{{ env('APP_NAME') }}"
        },
        "articleBody": "{{ $page->meta_description }}"
        }
    </script>
@stop

@push('style')
    <link rel="stylesheet" href="{{ mix('/css/subpage-stack.css') }}" />
@endpush

@section('content')
    @if (!empty($page->getMainImage()))
        <div class="main-image text-center-box" style="background-image: url('{{ $page->getMainImage()->getFullUrl() }}')">
            <h1>{{ $page->title }}</h1>
        </div>
    @endif

    <div class="container">
        <div class="content">
            @if (empty($page->getMainImage()))
                <h1>{{ $page->title }}</h1>
            @endif
            <h2>{{ $page->caption }}</h2>
            <div>
                {!! $page->body !!}
            </div>
            <div class="gallery">
                @if (!$page->getMedia('gallery')->isEmpty())
                    <div class="row no-gutters">
                        @foreach ($page->getMedia('gallery') as $image)
                            <div class="col-md-4 p-1">
                                <a href="{{ $image->getFullUrl() }}" data-lightbox="roadtrip">
                                    <img src="{{ $image->getFullUrl('thumb') }}" class="img-fluid" title="{{ $image->getCustomProperty('title') }}" alt="{{ $image->getCustomProperty('alt') }}" />
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script src="{{ mix('/js/subpage-stack.js') }}"></script>
@endpush
