@extends( 'layouts.master' )

@section( 'heading', 'New user' )

@section( 'heading', 'New user' )


@section( 'main' )

    @include( 'errors.summary' )

    @row
        @col( s12 )
            <div class="card">
                <div class="card-content">
                    <span class="card-title">
                        <i class="material-icons">group</i>
                        Register
                    </span>
                    <p>Excellent! We are glad you are joining us. We just need your email, later we will ask
                        you all needed details such as name, date of birth, and so on.</p>
                    @row
                    <form class="col s12" action="{{ url('/register') }}" method="POST">
                        {{ csrf_field() }}
                        @row
                            @col( s12 input-field )
                                {!! MForm::input( 'email', 'E-mail', 'validate' ) !!}
                            @endcol
                            @col( s12 input-field )
                                {!! MForm::password( 'password', 'Choose a password', 'validate' ) !!}
                            @endcol
                            @col( s12 input-field )
                                {!! MForm::password( 'password_confirmation', 'Confirm password', 'validate' ) !!}
                            @endcol
                        @endrow
                        @row( right-align )
                            @col( s12 )
                                {!! MForm::submit( 'Register' ) !!}
                            @endcol
                        @endrow
                    </form>
                    @endrow
                </div>
            </div>
        @endcol
    @endrow

@endsection
