@php
    $techBreakConfig = technical_break_config();
@endphp

@if (env('APP_DEBUG') != false)
    <div class="panel panel-danger text-center">
        <div class="panel-body p-0">
            <div class="alert alert-danger h6 m-0">
                <b>
                    WARNING! The system debugger is turned ON
                </b>
            </div>
        </div>
    </div>
@endif

@if ((env('TECHNICAL_BREAK') == true || $techBreakConfig['enabled'] == true))
    <div class="panel panel-warning text-center">
        <div class="panel-body p-0">
            <div class="alert alert-warning">
                <b>
                    WARNING! The Technical break is turned ON from: 
                    @if (env('TECHNICAL_BREAK') == true)
                        <u>.env</u> 
                    @endif
                    @if ($techBreakConfig['enabled'] == true)
                        <u>Settings module</u> 
                    @endif
                </b>
            </div>
            <div class="text-left p-2">
                Only listed IP addresses have access to the website {{ env('APP_NAME') }}: 
                <ul>
                    @foreach ($techBreakConfig['accessable_ip_addresses'] as $ip)
                        <li>{{ $ip }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif