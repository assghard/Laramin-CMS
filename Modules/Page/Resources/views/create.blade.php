@extends('dashboard::layouts.master', ['pagesTab' => 'active'])

@section('title') Create new page @stop

@section('content')
    <a href="{{ route('dashboard.pages.index') }}">< Back to the list</a>
    <form action="{{ route('dashboard.pages.store') }}" method="POST" autocomplete="false">
        @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label>Title *</label>
                            <input id="title" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title') }}" required />
                            {!! $errors->first('title', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                            <label>Slug</label>
                            <input id="slug" type="text" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" name="slug" value="{{ old('slug') }}" />
                            {!! $errors->first('slug', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('caption') ? 'has-error' : '' }}">
                    <label>Caption</label>
                    <textarea name="caption" id="caption" rows="2" class="form-control {{ $errors->has('caption') ? 'is-invalid' : '' }}">{{ old('caption') }}</textarea>
                    {{-- <input id="caption" type="text" class="form-control {{ $errors->has('caption') ? 'is-invalid' : '' }}" name="caption" value="{{ old('caption') }}" /> --}}
                    {!! $errors->first('caption', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                </div>
                <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                    <label>Body</label>
                    <textarea name="body" id="body" rows="5" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">{{ old('body') }}</textarea>
                    {!! $errors->first('body', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                </div>

                <hr />
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <div class="btn btn-link" data-toggle="collapse" data-target="#meta-data" aria-expanded="false" aria-controls="meta-data">
                                    Meta data
                                </div>
                            </h5>
                        </div>
                        <div id="meta-data" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-group {{ $errors->has('meta_title') ? 'has-error' : '' }}">
                                    <label>Meta title</label>
                                    <input id="meta_title" type="text" class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}"
                                        name="meta_title" value="{{ old('meta_title') }}" />
                                    {!! $errors->first('meta_title', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                                </div>
                                <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                                    <label>Meta description</label>
                                    <input id="meta_description" type="text"
                                        class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}" name="meta_description"
                                        value="{{ old('meta_description') }}" />
                                    {!! $errors->first('meta_description', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <div class="btn btn-link collapsed" data-toggle="collapse" data-target="#og-data" aria-expanded="false" aria-controls="og-data">
                                    Open graph data
                                </div>
                            </h5>
                        </div>
                        <div id="og-data" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-group {{ $errors->has('og_title') ? 'has-error' : '' }}">
                                    <label>Open graph title</label>
                                    <input id="og_title" type="text" class="form-control {{ $errors->has('og_title') ? 'is-invalid' : '' }}"
                                        name="og_title" value="{{ old('og_title') }}" />
                                    {!! $errors->first('og_title', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                                </div>
                                <div class="form-group {{ $errors->has('og_description') ? 'has-error' : '' }}">
                                    <label>Open graph description</label>
                                    <input id="og_description" type="text" class="form-control {{ $errors->has('og_description') ? 'is-invalid' : '' }}"
                                        name="og_description" value="{{ old('og_description') }}" />
                                    {!! $errors->first('og_description', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                                </div>
                                <div class="form-group {{ $errors->has('og_type') ? 'has-error' : '' }}">
                                    <label>Open graph type</label>
                                    <input id="og_type" type="text" class="form-control {{ $errors->has('og_type') ? 'is-invalid' : '' }}"
                                        name="og_type" value="{{ old('og_type', 'article') }}" />
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
                        value="1" />
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
                        value="1" checked />
                    <label for="is_active" class="custom-control-label mb-0" for="is_active">
                        Is active
                        {!! $errors->first('is_active', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                    </label>
                </div>

                <hr />
                <h6>Gallery</h6>
            </div>
        </div>

        <div class="box-footer border-top pt-2 d-block my-4">
            <button type="submit" class="btn btn-primary btn-flat">Submit</button>
            <button class="btn btn-secondary btn-flat" name="button" type="reset">Reset</button>
            <a class="btn btn-danger float-right btn-flat" href="{{ route('dashboard.pages.index') }}"><i class="fa fa-times"></i> Close</a>
        </div>
    </form>
@stop
