@if (session()->has('status'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>{{ session('status') }}</strong>
    </div>
@endif