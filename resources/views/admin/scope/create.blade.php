@extends( 'layouts.master' )

@section( 'title', 'Admin :: OAuth2 scopes' )

@section( 'heading', 'Create OAuth2 scope' )

@section( 'main' )

    @row
        <form class="col s12" method="post" action="{{ action( 'Admin\ScopeController@store', [ 'scope' => $scope ] ) }}">
            @include( 'admin.scope.form', [ 'scope' => $scope ] )
        </form>
    @endrow

@endsection
