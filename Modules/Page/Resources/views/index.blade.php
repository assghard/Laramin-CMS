@extends('dashboard::layouts.master', ['pagesTab' => 'active'])

@section('title') Pages ({{ $entities->total() }}) @stop

@section('content')
    <div class="text-right mb-2">
        <a href="{{ route('dashboard.pages.create') }}" class="btn btn-primary">Create new page</a>
    </div>
    <div class="table-responsive mt-1">
        <table class="table table-striped table-sm table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Is active</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entities as $page)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ ($page->is_homepage == 1) ? 'homepage' : 'subpage' }}</td>
                        <td>{!! ($page->is_active == 1) ? '<span class="badge badge-success">active</span>' : '<span class="badge badge-secondary">inactive</span>' !!}</td>
                        <td>{{ $page->created_at }}</td>
                        <td>
                            <a href="{{ route('dashboard.pages.edit', $page->id) }}" class="btn btn-primary"><span class="oi oi-pencil"></span></a>
                            @if ($page->is_homepage == 1)
                                <a href="{{ route('page.homepage') }}" class="btn btn-info" target="_blank"><span class="oi oi-eye"></span></a>
                            @else
                                <a href="{{ route('page.subpage', $page->slug) }}" class="btn btn-info" target="_blank"><span class="oi oi-eye"></span></a>
                            @endif
                            <button class="btn btn-danger" onclick="deleteEntity('{{ route('dashboard.pages.delete', $page->id) }}', event)"><span class="oi oi-trash"></span></button>
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
