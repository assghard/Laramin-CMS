@if (Session::has('success'))
<div class="panel panel-success text-center blinking">
    <div class="panel-body">
        {{ Session::get('success') }}
    </div>
</div>
@endif

@if (Session::has('error'))
<div class="panel panel-danger blinking text-center">
    <div class="panel-body">
        {{ Session::get('error') }}
    </div>
</div>
@endif

@if (Session::has('warning'))
<div class="panel panel-warning text-center">
    <div class="panel-body">
        {{ Session::get('warning') }}
    </div>
</div>
@endif