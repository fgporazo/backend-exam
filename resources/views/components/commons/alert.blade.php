<div class="row clearfix">
    <div class="col">
        @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span><strong class="font-bold">Error!</strong>  Please check the following fields</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <br />
            @foreach ($errors->all() as $error)
                {{ $error }} <br />
            @endforeach
        </div>
        @endif
        
        @if(session()->has('msg'))
        <div class="alert alert-{{session()->get('msgClass')}} alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
                <strong>{!! session()->get('msg') !!}</strong>
            </div>
        @endif
    </div>
</div>
