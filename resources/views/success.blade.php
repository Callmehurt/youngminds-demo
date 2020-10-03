<div class="success-alert">
    @if(session()->has('success'))

        <div class="col-md-12 col-xs-12">
            <div class="alert alert-success" role="alert" style="text-align: center">
                {!! session()->get('success') !!}
            </div>
        </div>

    @endif
</div>