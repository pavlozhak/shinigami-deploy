<div class="row mt-3 mb-3">
    <div class="col-12">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <h5>Errors</h5>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
