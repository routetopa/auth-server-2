@extends( 'layouts.master' )

@section( 'main' )

    <h1>Forgot password</h1>

    @include( 'errors.summary' )

    @row
        @col( s12 )
            <div class="card">
                <div class="card-content">
                    <span class="card-title">
                        <i class="material-icons">live_help</i>
                        Reset password
                    </span>
                    <p>Insert your e-mail here: we will send you an email with a link that you can use to
                        reset your password.</p>
                    @row
                    <form class="col s12" action="{{ url('/password/email') }}" method="POST">
                        {{ csrf_field() }}
                        @row
                            @col( s12 input-field )
                                {!! MForm::input( 'email', 'E-mail', 'validate' ) !!}
                            @endcol
                        @endrow
                        @row( right-align )
                            @col( s12 )
                                {!! MForm::submit( 'Reset' ) !!}
                            @endcol
                        @endrow
                    </form>
                    @endrow
                </div>
            </div>
        @endcol
    @endrow

@endsection
