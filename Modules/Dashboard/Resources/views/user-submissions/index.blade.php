@extends('dashboard::layouts.master', ['submissionsTab' => 'active'])

@section('title') User submissions ({{ $entities->total() }}) @stop

@section('content')
    <div class="table-responsive mt-1">
        <table class="table table-striped table-sm table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>E-mail</th>
                    <th>Created at</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entities as $contactRequest)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contactRequest->email }}</td>
                        <td>{{ $contactRequest->created_at }}</td>
                        <td>{{ $contactRequest->description }}</td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteEntity('{{ route('dashboard.user-submissions.delete', $contactRequest->id) }}', event)"><span class="oi oi-trash"></span></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination-box">
        {!! $entities->appends(Request::query())->links('pagination::bootstrap-4') !!}
    </div>
@endsection
