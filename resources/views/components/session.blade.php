@if (Session::has('success'))
<div class="alert alert-success">
    <p>{{ Session::get('success') }}</p>
</div>
@endif
