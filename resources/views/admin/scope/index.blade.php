@extends( 'layouts.master' )

@section( 'title', 'Admin :: OAuth2 scopes' )

@section( 'heading', 'OAuth2 scopes management' )

@section( 'main' )

    <div class="container">
    @row
        @col( s12 right-align )
            <a class="btn-floating btn-large waves-effect waves-light" href="{{ action( 'Admin\ScopeController@create' ) }}"><i class="material-icons">add</i></a>
        @endcol
    @endrow
    </div>

    @row

        @col( s12 )

            <table class="striped">
                <thead>
                    <tr>
                        <th data-field="is_default">Default</th>
                        <th data-field="scope">Scope</th>
                        <th data-field="created_at">Created</th>
                        <th data-field="updated_at">Updated</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach( $scopes as $scope )
                    <tr>
                        <td>
                            @if ( $scope->is_default )
                                <i class="material-icons red-text" title="Default">grade</i>
                            @endif
                        </td>
                        <td>{{ $scope->scope }}</td>
                        <td>{{ $scope->created_at }}</td>
                        <td>{{ $scope->updated_at }}</td>
                        <td>
                            <a href="{{ action( 'Admin\ScopeController@edit', [ 'scope' => $scope ] ) }}" title="Edit scope"><i class="material-icons">mode edit</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endcol

    @endrow

@endsection