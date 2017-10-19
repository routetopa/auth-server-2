@extends( 'layouts.master' )

@section( 'title', trans( 'install.index.meta_title' ) )

@section( 'heading', trans( 'install.index.title' ) )

@section( 'main' )

    @include( 'errors.summary' )

    @row
        @col( s12 )
            @lang( 'install.index.message' )
        @endcol
    @endrow


    <form class="col s12" method="post" action="{{ action( 'InstallController@create_admin_do' ) }}">
        {{ csrf_field() }}

        @row
            @col( s12 input-field )
                {!! MForm::input( 'email' )->tlabel( 'user.model.email' ) !!}
            @endcol
        @endrow

        @row
            @col( s6 input-field )
                {!! MForm::password( 'password' )->tlabel( 'user.model.password' ) !!}
            @endcol
            @col( s6 input-field )
                {!! MForm::password( 'password_confirmation' )->tlabel( 'user.model.password_confirm' ) !!}
            @endcol
        @endrow

        @row
            @col( s12 right-align )
                {!! MForm::submit( trans( 'form.save' ) ) !!}
            @endcol
        @endrow

    </form>

@endsection