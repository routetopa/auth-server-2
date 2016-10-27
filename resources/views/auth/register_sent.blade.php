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
                <p>In order to verify you address, we sent you a confirmation link at your e-mail address.</p>
            </div>
            <div class="card-action">
                <form action="{{ action( 'Auth\RegisterController@sendValidation' ) }}" method="post">
                    {{ csrf_field() }}
                    {!! MForm::submit( 'Re-send verification email' ) !!}
                </form>
            </div>
        </div>
        @endcol
    @endrow

@endsection
