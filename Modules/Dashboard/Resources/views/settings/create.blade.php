@extends('dashboard::layouts.master', ['settingsTab' => 'active'])

@section('title') Create new setting entity @stop

@section('content')
    <a href="{{ route('dashboard.settings.index') }}">< Back to list</a>

    <form action="{{ route('dashboard.settings.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Sys name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Setting sys name" required />
                    @if (Session::has('name'))
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ Session::get('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Value</label>
                    <input id="value" type="text" class="form-control" name="value" value="{{ old('value') }}" placeholder="Setting value" required />
                    @if (Session::has('value'))
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ Session::get('value') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Description</label>
                    <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Description" />
                    @if (Session::has('description'))
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ Session::get('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="box-footer border-top pt-2 d-block mb-4">
            <button type="submit" class="btn btn-primary btn-flat" name="button" value="index">
                <i class="fa fa-angle-left"></i>
                < Submit and back
            </button>
            <button class="btn btn-secondary btn-flat" name="button" type="reset">Resetuj</button>
            <a class="btn btn-danger float-right btn-flat" href="{{ route('dashboard.settings.index') }}"><i class="fa fa-times"></i> Zamknij</a>
        </div>
    </form>
@stop
