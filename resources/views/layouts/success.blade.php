<div class="row mt-3 mb-3">
    <div class="col-12">
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                <h5>Success</h5>
                {{ Session::get('success') }}
            </div>
        @endif
    </div>
</div>
