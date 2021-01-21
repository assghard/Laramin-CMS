@extends('dashboard::layouts.master', ['errorsTab' => 'active'])

@section('title') System Errors ({{ $entities->total() }}) @stop

@section('content')
    <div class="text-right mb-1">
        <a class="btn btn-danger" onclick="deleteEntity('{{ route('dashboard.system-errors.truncate') }}', event)">Delete all (table truncate)</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>created_at</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entities as $entity)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $entity->created_at }}</td>
                    <td>{{ $entity->name }}</td>
                    <td>
                        @dump($entity->description)
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="deleteEntity('{{ route('dashboard.system-errors.delete', $entity->id) }}', event)"><span class="oi oi-trash"></span></button>
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