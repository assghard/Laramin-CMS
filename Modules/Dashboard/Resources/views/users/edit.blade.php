@extends('dashboard::layouts.master', ['usersTab' => 'active'])

@section('title') Edit user {{ $user->email }} @stop

@section('content')
    <a href="{{ route('dashboard.users.index') }}">< Back to user list</a>
    <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}

        <div class="row">
            <div class="col-md-6">
                <fieldset>
                    <legend>User data</legend>
                </fieldset>
                <div class="row">
                    <div class="col-md-4">
                        <b>Created at</b>
                        <div>
                            {{ $user->created_at }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <b>Verified at</b>
                        <div>
                            @if (empty($user->email_verified_at))
                                {{-- TODO: <a href="{{ route('dashboard.users.activate-account', $user->id) }}" class="btn btn-primary btn-sm">Activate user</a> --}}
                            @endif
                            {{ $user->email_verified_at }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <b>Last update</b>
                        <br />
                        {{ $user->updated_at }}
                    </div>
                    <div class="col-md-4">
                        <div class="i-check checkbox{{ $errors->has('is_admin') ? ' has-error' : '' }}">
                            <label for="is_admin">
                                <input id="is_admin"
                                    name="is_admin"
                                    type="checkbox"
                                        value="{{ $user->is_admin }}" {{ ($user->is_admin == 1) ? 'checked' : '' }}  />
                                    Is admin account
                                {!! $errors->first('is_admin', '<span class="help-block">:message</span>') !!}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <fieldset>
                    <legend>Personal data</legend>
                </fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>E-mail</label>
                            <div class="input-group">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required readonly />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" onclick="unlockInput(this, '#email')" type="button"><span class="oi oi-pencil"></span></button>
                                </div>
                            </div>
                            @if (Session::has('email'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ Session::get('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" />
                            @if (Session::has('name'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ Session::get('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <hr />
        <fieldset>
            <legend>Company data</legend>
        </fieldset> --}}

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
