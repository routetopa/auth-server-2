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

                    <p>Please insert your e-mail in the form below and choose a new password.</p>

                    @row
                    <form class="col s12" action="{{ url( '/password/reset' ) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">

                        @row
                            @col( s12 input-field )
                                {!! MForm::input( 'email' )->label( 'E-mail' )->value( $email or old('email') ) !!}
                            @endcol
                        @endrow

                        @row
                            @col( s12 input-field )
                                {!! MForm::password( 'password' )->label( 'Choose a password' ) !!}
                            @endcol
                        @endrow

                        @row
                            @col( s12 input-field )
                                {!! MForm::password( 'password_confirmation' )->label( 'Confirm password' ) !!}
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
