@extends('dashboard::layouts.master', ['pagesTab' => 'active'])

@section('title') Edit page {{ $page->title }} @stop

@section('content')
    <a href="{{ route('dashboard.pages.index') }}">< Back to list</a>
    <div class="text-right">
        <a href="{{ route('page.subpage', $page->slug) }}" class="btn btn-link" target="_blank">See subpage <span class="oi oi-eye"></span></a>
    </div>
    <form action="{{ route('dashboard.pages.update', $page->id) }}" method="POST" enctype='multipart/form-data'>
        @csrf
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label>Title *</label>
                            <input id="title" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title', $page->title) }}" required />
                            {!! $errors->first('title', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                            <label>Slug</label>
                            <input id="slug" type="text" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" name="slug" value="{{ old('slug', $page->slug) }}" />
                            {!! $errors->first('slug', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('caption') ? 'has-error' : '' }}">
                    <label>Caption</label>
                    <textarea name="caption" id="caption" rows="2" class="form-control {{ $errors->has('caption') ? 'is-invalid' : '' }}">{{ old('caption', $page->caption) }}</textarea>
                    {!! $errors->first('caption', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                </div>
                <hr />
                <div id="accordion" class="system-accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#meta-data" aria-expanded="false" aria-controls="meta-data">
                            <h5 class="mb-0">Meta data</h5>
                        </div>
                        <div id="meta-data" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-group {{ $errors->has('meta_title') ? 'has-error' : '' }}">
                                    <label>Meta title</label>
                                    <input id="meta_title" type="text" class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}"
                                        name="meta_title" value="{{ old('meta_title', $page->meta_title) }}" />
                                    {!! $errors->first('meta_title', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                                </div>
                                <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                                    <label>Meta description</label>
                                    <input id="meta_description" type="text"
                                        class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}" name="meta_description"
                                        value="{{ old('meta_description', $page->meta_description) }}" />
                                    {!! $errors->first('meta_description', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header collapsed" id="headingTwo"data-toggle="collapse" data-target="#og-data" aria-expanded="false" aria-controls="og-data">
                            <h5 class="mb-0">Open graph data</h5>
                        </div>
                        <div id="og-data" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-group {{ $errors->has('og_title') ? 'has-error' : '' }}">
                                    <label>Open graph title</label>
                                    <input id="og_title" type="text" class="form-control {{ $errors->has('og_title') ? 'is-invalid' : '' }}"
                                        name="og_title" value="{{ old('og_title', $page->og_title) }}" />
                                    {!! $errors->first('og_title', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                                </div>
                                <div class="form-group {{ $errors->has('og_description') ? 'has-error' : '' }}">
                                    <label>Open graph description</label>
                                    <input id="og_description" type="text" class="form-control {{ $errors->has('og_description') ? 'is-invalid' : '' }}"
                                        name="og_description" value="{{ old('og_description', $page->og_description) }}" />
                                    {!! $errors->first('og_description', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                                </div>
                                <div class="form-group {{ $errors->has('og_type') ? 'has-error' : '' }}">
                                    <label>Open graph type</label>
                                    <input id="og_type" type="text" class="form-control {{ $errors->has('og_type') ? 'is-invalid' : '' }}"
                                        name="og_type" value="{{ old('og_type', $page->og_type) }}" />
                                    {!! $errors->first('og_type', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="ml-4 checkbox{{ $errors->has('is_homepage') ? ' has-error' : '' }}">
                    <input type="hidden" name="is_homepage" value="0"/>
                    <input id="is_homepage"
                        name="is_homepage"
                        type="checkbox"
                        class="custom-control-input"
                        value="1" {{ ($page->is_homepage == 1) ? 'checked' : '' }} />
                    <label for="is_homepage" class="custom-control-label mb-0" for="is_homepage">
                        Is homepage
                        {!! $errors->first('is_homepage', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                    </label>
                </div>
                <div class="ml-4 checkbox{{ $errors->has('is_active') ? ' has-error' : '' }}">
                    <input type="hidden" name="is_active" value="0"/>
                    <input id="is_active"
                        name="is_active"
                        type="checkbox"
                        class="custom-control-input"
                        value="1" {{ ($page->is_active == 1) ? 'checked' : '' }} />
                    <label for="is_active" class="custom-control-label mb-0" for="is_active">
                        Is active
                        {!! $errors->first('is_active', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                    </label>
                </div>
                <hr />
                <h4>Media</h4>
                <div class="alert alert-info">
                    Registered media collections for this model: <b>{{ $page->getRegisteredMediaCollections()->implode('name', ', ') }}</b>
                </div>

                <h5>Main image (x1)</h5>
                <div>
                    @include('media::inputs.single', ['name' => 'main'])
                    @if (!empty($page->getMainImage()))
                        @include('media::partials.image-box', ['image' => $page->getMainImage()])
                    @endif
                </div>
            </div>
        </div>
        <hr />
        <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
            <label>Body</label>
            <textarea name="body" id="body" rows="20" class="tinymce-editor form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">{{ old('body', $page->body) }}</textarea>
            {!! $errors->first('body', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
        </div>
        <hr class="mt-3" />
        <h5>Gallery</h5>
        @include('media::inputs.multiple', ['name' => 'gallery'])

        @if (!$page->getMedia('gallery')->isEmpty())
            <div id="gallery-accordion" class="system-accordion">
                <div class="card">
                    <div class="card-header" id="headingGallery" data-toggle="collapse" data-target="#gallery-images" aria-expanded="false" aria-controls="gallery-images">
                        <h5 class="mb-0">Assigned media ({{ $page->getMedia('gallery')->count() }})</h5>
                    </div>
                    <div id="gallery-images" class="collapse" aria-labelledby="headingGallery" data-parent="#gallery-accordion">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($page->getMedia('gallery') as $image)
                                    <div class="col-md-4">
                                        @include('media::partials.image-box', ['image' => $image])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="box-footer border-top pt-2 d-block my-4">
            <button type="submit" class="btn btn-primary btn-flat" name="button" value="index">
                <i class="fa fa-angle-left"></i>
                < Update and back
            </button>
            <button type="submit" class="btn btn-primary btn-flat">Update</button>
            <button class="btn btn-secondary btn-flat" name="button" type="reset">Reset</button>
            <a class="btn btn-danger float-right btn-flat" href="{{ route('dashboard.pages.index') }}"><i class="fa fa-times"></i> Close</a>
        </div>
    </form>
@stop

@push('scripts')
    <script src="{{ mix('js/tinymce-editor.js') }}"></script>
@endpush