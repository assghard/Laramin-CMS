@extends('dashboard::layouts.master', ['usersTab' => 'active'])

@section('title') Users @stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('dashboard.users.index') }}" method="get">
                <div class="input-group mb-2">
                    <input name="email" type="text" class="form-control" placeholder="Find by e-mail" value="{{ Request::get('email') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">
                            <span class="oi oi-magnifying-glass"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="text-right">
                <a href="{{ route('dashboard.users.create') }}" class="btn btn-secondary">Create new user</a>
            </div>
        </div>
    </div>
    <div class="table-responsive mt-1">
        <table class="table table-striped table-sm table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Created at</th>
                    <th>Verified at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entities as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ($user->is_admin == 1) ? 'admin' : 'user' }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->email_verified_at }}</td>
                        <td>
                            <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-primary"><span class="oi oi-pencil"></span></a>
                            @if ($user->id != \Auth::user()->id)
                                <button class="btn btn-danger" onclick="deleteEntity('{{ route('dashboard.users.delete', $user->id) }}', event)"><span class="oi oi-trash"></span></button>
                            @endif
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
