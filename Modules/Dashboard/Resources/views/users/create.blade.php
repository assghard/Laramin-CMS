@extends('dashboard::layouts.master', ['usersTab' => 'active'])

@section('title') Create new user @stop

@section('content')
    <a href="{{ route('dashboard.users.index') }}">< Back to user list</a>
    <form action="{{ route('dashboard.users.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label>E-mail</label>
                    <div class="input-group">
                        <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required />
                    </div>
                    {!! $errors->first('email', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label>Name</label>
                    <input id="name" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" />
                    {!! $errors->first('name', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                </div>
            </div>
        </div>

        <div class="box-footer border-top pt-2 d-block mb-4">
            <button type="submit" class="btn btn-primary btn-flat" name="button" value="index">
                <i class="fa fa-angle-left"></i>
                < Update and back
            </button>
            <button type="submit" class="btn btn-primary btn-flat">Update</button>
            <button class="btn btn-secondary btn-flat" name="button" type="reset">Reset</button>
            <a class="btn btn-danger float-right btn-flat" href="{{ route('dashboard.users.index') }}"><i class="fa fa-times"></i> Close</a>
        </div>
    </form>
@stop
