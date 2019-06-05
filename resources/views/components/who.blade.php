@if(Auth::guard('web')->check())
    <p class="text-success">
        You are logged in as <strong>Employee/USER</strong>
    </p>
@else
    <p class="text-danger">
    You are logged out as <strong>Employee/USER</strong>
    </p>
@endif

@if(Auth::guard('client')->check())
    <p class="text-success">
        You are logged in as <strong>CLIENT</strong>
    </p>
@else
    <p class="text-danger">
    You are logged out as <strong>CLIENT</strong>
    </p>
@endif
