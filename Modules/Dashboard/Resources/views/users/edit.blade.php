@extends('dashboard::layouts.master', ['usersTab' => 'active'])

@section('title') Edit user {{ $user->email }} @stop

@section('content')
    <a href="{{ route('dashboard.users.index') }}">< Back to user list</a>
    <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}

        <div class="row">
            <div class="col-md-7">
                <fieldset>
                    <legend>User data</legend>
                </fieldset>
                <div class="row">
                    <div class="col-md-4">
                        <b>Created at</b>
                        <div>
                            {{ $user->created_at }}
                        </div>
                        <div class="ml-4 checkbox{{ $errors->has('is_admin') ? ' has-error' : '' }}">
                            <input type="hidden" name="is_admin" value="0"/>
                            <input id="is_admin"
                                name="is_admin"
                                type="checkbox"
                                class="custom-control-input"
                                value="1" {{ ($user->is_admin == 1) ? 'checked' : '' }} />
                            <label for="is_admin" class="custom-control-label mb-0" for="is_admin">
                                Is admin account
                                {!! $errors->first('is_admin', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <b>Verified at</b>
                        <div>
                            {{ $user->email_verified_at }}
                            <div class="ml-4 checkbox{{ $errors->has('activated_user') ? ' has-error' : '' }}">
                                <input type="hidden" name="activated_user" value="0"/>
                                <input id="activated_user"
                                    name="activated_user"
                                    type="checkbox"
                                    class="custom-control-input"
                                    value="1" {{ (!empty($user->email_verified_at)) ? 'checked' : '' }} />
                                <label for="activated_user" class="custom-control-label mb-0" for="activated_user">
                                    User is active 
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <b>Last update</b>
                        <br />
                        {{ $user->updated_at }}
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <fieldset>
                    <legend>Personal data</legend>
                </fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label>E-mail *</label>
                            <div class="input-group">
                                <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required readonly />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" onclick="unlockInput(this, '#email')" type="button"><span class="oi oi-pencil"></span></button>
                                </div>
                            </div>
                            {!! $errors->first('email', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label>Name</label>
                            <input id="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" />
                            {!! $errors->first('name', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" value="" />
                            {!! $errors->first('password', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <label>Password confirmation</label>
                            <input id="password_confirmation" type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" value="" />
                            {!! $errors->first('password_confirmation', '<span class="invalid-feedback d-block"><b>:message</b></span>') !!}
                        </div>
                    </div>
                </div>
                <div>
                    <i>
                        At least: one Uppercase letter, one Lower case letter, one numeric value, one special character, must be more than 8 characters long
                    </i>
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
