@extends('dashboard::layouts.master', ['settingsTab' => 'active'])

@section('title') Settings @stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div>
                <h5>Technical Break</h5>
                @if ($techBreakConfig['enabled'] == true)
                    <a href="{{ route('dashboard.settings.technical-break', 'turn-off') }}" class="btn btn-secondary"><span class="oi oi-wrench"></span>  Turn OFF technical break</a>
                @else
                    <a href="{{ route('dashboard.settings.technical-break', 'turn-on') }}" class="btn btn-warning"><span class="oi oi-wrench"></span>  Turn ON technical break</a>
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div>
                Your IP address: <b>{{ $ipAddress }}</b>
            </div>
            <form action="{{ route('dashboard.settings.ip-addresses-update') }}" method="POST">
                @csrf
                <label for="config_ip_addresses">If Technical Break is ON - only listed IP addresses have access to the website</label>
                <textarea name="config_ip_addresses" id="config_ip_addresses" class="form-control" rows="3">{!! @implode("\n", $techBreakConfig['accessable_ip_addresses']) !!}</textarea>
                <div class="text-right">
                    <button type="submit" class="btn btn-secondary"><span class="oi oi-wrench"></span> Update IP list</button>
                </div>
            </form>
        </div>
    </div>
    <hr />

    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <b class="h5">.env (take care of config after install CMS) </b>
                    <div>
                        App name: <b>{{ env('APP_NAME') }}</b>
                    </div>
                    <div>
                        App env: <b>{{ env('APP_ENV') }}</b>
                    </div>
                    <div>
                        App URL: <b>{{ env('APP_URL') }}</b>
                    </div>
                    <div>
                        App timezone: <b>{{ env('APP_TIMEZONE') }}</b>
                    </div>
                    <div>
                        App locale: <b>{{ env('APP_LOCALE') }}</b>
                    </div>
                    <div>
                        Session encrypt: <b>{{ env('SESSION_ENCRYPT') }}</b>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div>
                        Mail mailer: <b>{{ env('MAIL_MAILER') }}</b>
                    </div>
                    <div>
                        Mail host: <b>{{ env('MAIL_HOST') }}</b>
                    </div>
                    <div>
                        Mail port: <b>{{ env('MAIL_PORT') }}</b>
                    </div>
                    <div>
                        Mail username: <b>{{ env('MAIL_USERNAME') }}</b>
                    </div>
                    <div>
                        Mail password: <b>{{ env('MAIL_PASSWORD') }}</b>
                    </div>
                    <div>
                        Mail encryption: <b>{{ env('MAIL_ENCRYPTION') }}</b>
                    </div>
                    <div>
                        Mail from address: <b>{{ env('MAIL_FROM_ADDRESS') }}</b>
                    </div>
                    <div>
                        Mail from name: <b>{{ env('MAIL_FROM_NAME') }}</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-7">
        </div>
    </div>
    <hr />
    <div class="text-right mb-2">
        <a href="{{ route('dashboard.settings.create') }}" class="btn btn-primary">Create new entity</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entities as $entity)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $entity->name }}</td>
                        <td>{{ $entity->value }}</td>
                        <td>{{ $entity->description }}</td>
                        <td>
                            <a href="{{ route('dashboard.settings.edit', $entity->id) }}" class="btn btn-primary"><span class="oi oi-pencil"></span></a>
                            <button class="btn btn-danger" onclick="deleteEntity('{{ route('dashboard.settings.delete', $entity->id) }}', event)"><span class="oi oi-trash"></span></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination-box">
        {!! $entities->appends(Request::query())->links() !!}
    </div>
@endsection
