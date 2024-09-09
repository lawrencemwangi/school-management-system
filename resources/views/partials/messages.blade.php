@if (!empty(session('error')))
    <div class="alert alert_danger" data-duration="{{ 'alert.duration' }}">
        {{ session('error.message') }}
    </div>
    
@endif

@if(!empty(session('success')))
    <div class="alert alert-success" data-duration="{{ session('success.duration') }}">
        {{ session('success.message') }}
    </div>
@endif

@if(!empty(session('warning')))
    <div class="alert alert-warning" data-duration="{{ session('warning.duration') }}">
        {{ session('warning.message') }}
    </div>
@endif