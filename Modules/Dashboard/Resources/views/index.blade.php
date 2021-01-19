@extends('dashboard::layouts.master', ['dashboardTab' => 'active'])

@section('title') Dashboard @stop

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-body">
                    <b class="h5">{{ number_separator($usersCount) }}</b>
                    <div>
                        Users in database
                    </div>
                </div>
                <a href="{{ route('dashboard.users.index') }}" class="btn btn-primary btn-block">Users <span class="oi oi-arrow-right"></span></a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-info text-center">
                <div class="panel-body">
                    <b class="h5">{{ number_separator($pagesCount) }}</b>
                    <div>
                        Pages in database
                    </div>
                </div>
                <a href="{{-- route('') --}}" class="btn btn-info btn-block">Pages <span class="oi oi-arrow-right"></span></a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-warning text-center">
                <div class="panel-body">
                    <b class="h5">XXX</b> TODO
                    <div>
                        In this month
                    </div>
                </div>
                <a href="{{-- route('') --}}" class="btn btn-warning btn-block">Btn <span class="oi oi-arrow-right"></span></a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-default text-center">
                <div class="panel-body">
                    <b class="h5">NNN</b> TODO 
                    <div>
                        CMS tasks
                    </div>
                </div>
                <a href="{{-- route('') --}}" class="btn btn-secondary btn-block">Btn <span class="oi oi-arrow-right"></span></a>
            </div>
        </div>
    </div>
@endsection