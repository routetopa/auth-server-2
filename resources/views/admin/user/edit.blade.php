@extends( 'layouts.master' )

@section( 'title', 'Admin :: Users' )

@section( 'heading', 'Edit user' )

@section( 'main' )

    @row
        <form class="col s12" method="post" action="{{ action( 'Admin\UserController@update', [ 'user' => $user ] ) }}">
            {{ method_field('PUT') }}
            @include( 'admin.user.form', [ 'user' => $user ] )
        </form>
    @endrow

    @row
        <form class="col s12" method="post" action="{{ action( 'Admin\UserController@destroy', [ 'user' => $user ] ) }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            @row( right-align )
                @col( s12 )
                    {!! MForm::submit()->content( "Delete <i class=\"material-icons right\">delete</i>" )->css( 'red lighten-2' ) !!}
                @endcol
            @endrow
        </form>
    @endrow

@endsection
