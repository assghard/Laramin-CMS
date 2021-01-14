@if (Session::has('success'))
    <div class="alert alert-success my-2">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger my-2">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ Session::get('error') }}
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-warning my-2">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ Session::get('warning') }}
    </div>
@endif

@if (Session::has('info'))
    <div class="alert alert-info my-2">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ Session::get('info') }}
    </div>
@endif
