@extends( 'layouts.master' )

@section( 'title', trans( 'install.installed.meta_title' ) )

@section( 'heading', trans( 'install.installed.title' ) )

@section( 'main' )

    @include( 'errors.summary' )

    @row
        @col( s12 )
            @lang( ( isset( $email ) ? 'install.installed.message_email' : 'install.installed.message' ), [ 'email' => $email ] )
        @endcol
    @endrow

    @row
        @col( s12 right-align )
            <a class="btn waves-effect waves-light" href="{{ route( 'login' ) }}">
                @lang( 'auth.login.login_card.action' )
                <i class="material-icons right">send</i>
            </a>
        @endcol
    @endrow


@endsection