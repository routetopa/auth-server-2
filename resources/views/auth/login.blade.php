@extends( 'layouts.master' )

@section( 'title', 'Log in' )

@section( 'heading', 'Welcome' )


@section( 'main' )

    @include( 'errors.summary' )

    @row
        @col( s7 )
            <div class="card">
                <div class="card-content">
                    <span class="card-title">
                        <i class="material-icons">group</i>
                        Log in
                    </span>
                    <p>If you are already registered, log in using your username and password.</p>
                    @row
                        <form class="col s12" action="{{ url('/login') }}" method="POST">
                            {{ csrf_field() }}
                            @row
                                @col( s12 input-field )
                                    {!! MForm::input( 'email' )->label( 'E-mail' )->css( 'validate' ) !!}
                                @endcol
                                @col( s12 input-field )
                                    {!! MForm::password( 'password' )->label( 'Password' )->css( 'validate' ) !!}
                                @endcol
                                @col( s12 )
                                    {!! MForm::checkbox( 'remember' )->label( 'Remember me' )->css( 'validate' )->ghost( 0 ) !!}
                                @endcol
                            @endrow
                            @row
                                @col( s12 right-align )
                                    {!! MForm::submit( 'Log in' ) !!}
                                @endcol
                            @endrow
                        </form>
                    @endrow
                </div>
            </div>
        @endcol

        @col( s5 )
        @if ( setting( 'registration_open' ) )
            <div class="card green lighten-4">
                <div class="card-content">
                    <span class="card-title green-text">
                        <i class="material-icons">group</i>
                        New user?
                    </span>
                    <p>
                        Join us and start working on Open Data: create, publish and discuss them.
                    </p>
                </div>
                <div class="card-action">
                    <a href="{{ url('/register') }}">Register now</a>
                </div>
            </div>
        @endif
            <div class="card blue-grey lighten-4">
                <div class="card-content">
                    <span class="card-title blue-grey-text">
                        <i class="material-icons">live_help</i>
                        Forgot password?
                    </span>
                    <p>
                        We can e-mail you a link that will help you in resetting your password.
                    </p>
                </div>
                <div class="card-action">
                    <a class="blue-grey-text" href="{{ url('/password/reset') }}">Reset password</a>
                </div>
            </div>
        @endcol
    @endrow

@endsection