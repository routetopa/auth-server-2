@extends( 'layouts.master' )

@section( 'title', 'Admin :: OAuth2 scopes' )

@section( 'heading', 'Edit OAuth2 scope' )

@section( 'main' )

    @row
        <form class="col s12" method="post" action="{{ action( 'Admin\ScopeController@update', [ 'scope' => $scope ] ) }}">
            {{ method_field('PUT') }}
            @include( 'admin.scope.form', [ 'scope' => $scope ] )
        </form>
    @endrow

    @row
        <form class="col s12" method="post" action="{{ action( 'Admin\ScopeController@destroy', [ 'scope' => $scope ] ) }}">
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
