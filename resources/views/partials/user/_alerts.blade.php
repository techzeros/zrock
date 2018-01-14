
    <div class="row">
        <div class="col-md-12">

            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has($msg))
                        <div class="alert alert-{{ $msg }} fade in">
                                <span class="close" data-dismiss="alert">×</span>
                                <i class="fa fa-check fa-2x pull-left"></i>
                           <p> {{ Session::get($msg) }} </p>
                             </div>
                    @endif
                @endforeach
            </div> <!-- end .flash-message -->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
