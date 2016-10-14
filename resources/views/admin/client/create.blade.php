@extends( 'layouts.master' )

@section( 'title', 'Admin :: OAuth2 clients' )

@section( 'heading', 'Create OAuth2 client' )

@section( 'main' )

    @row
        <form class="col s12" method="post" action="{{ action( 'Admin\ClientController@store', [ 'client' => $client ] ) }}">
            @include( 'admin.client.form', [ 'client' => $client ] )
        </form>
    @endrow

@endsection
