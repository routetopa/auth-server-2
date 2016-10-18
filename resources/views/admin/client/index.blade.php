@extends( 'layouts.master' )

@section( 'title', 'Admin :: OAuth2 clients' )

@section( 'heading', 'OAuth2 client management' )

@section( 'stretch' )

    <div class="container">
    @row
        @col( s12 right-align )
            <a class="btn-floating btn-large waves-effect waves-light" href="{{ action( 'Admin\ClientController@create' ) }}"><i class="material-icons">add</i></a>
        @endcol
    @endrow
    </div>

    @row

        @col( s12 )

            <table class="striped">
                <thead>
                    <tr>
                        <th data-field="client_id">Client Id</th>
                        <th data-field="client_secret">Title</th>
                        <th data-field="grant_types">Grant types</th>
                        <th data-field="scope">Scope</th>
                        <th data-field="user_id">User Id</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach( $clients as $client )
                    <tr>
                        <td>{{ $client->client_id }}</td>
                        <td>{{ $client->title }}</td>
                        <td>{{ $client->grant_types }}</td>
                        <td>{{ $client->scope }}</td>
                        <td>{{ $client->user_id }}</td>
                        <td>
                            <a href="{{ action( 'Admin\ClientController@edit', [ 'client' => $client ] ) }}" title="Edit client"><i class="material-icons">mode edit</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endcol

    @endrow

@endsection