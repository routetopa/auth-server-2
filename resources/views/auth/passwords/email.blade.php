@extends( 'layouts.master' )

@section( 'title', 'Reset password' )

@section( 'heading', 'Forgot password' )

@section( 'main' )

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
                                {!! MForm::input( 'email' )->label( 'E-mail' ) !!}
                            @endcol
                        @endrow
                        @row
                            @col( s12 right-align )
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
