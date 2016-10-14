@extends( 'layouts.master' )

@section( 'title', 'Admin :: Users' )

@section( 'heading', 'User management' )

@section( 'stretch' )

    <div class="container">
    @row
        @col( s12 right-align )
            <a class="btn-floating btn-large waves-effect waves-light" href="{{ action( 'Admin\UserController@create' ) }}"><i class="material-icons">add</i></a>
        @endcol
    @endrow
    </div>

    @row

        @col( s12 )

            <table class="striped">
                <thead>
                    <tr>
                        <th data-field="id">Id</th>
                        <th data-field="username">Username</th>
                        <th data-field="email">E-mail</th>
                        <th data-field="roles">Roles</th>
                        <th data-field="is_banned">Status</th>
                        <th data-field="last_login_at">Last login</th>
                        <th data-field="created_at">Registered</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach( $users as $user )
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                        @foreach( explode( ' ', $user->roles ) as $role )
                            @if ( $role )
                                <div class="chip">{{ $role }}</div>
                            @endif
                        @endforeach
                        </td>
                        <td>
                        @if ( $user->is_banned )
                            <i class="material-icons red-text" title="Banned">block</i>
                        @else
                            <i class="material-icons green-text" title="Allowed">done</i>
                        @endif
                        </td>
                        <td>{{ $user->last_login_at }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href="{{ action( 'Admin\UserController@edit', [ 'user' => $user ] ) }}" title="Edit user"><i class="material-icons">mode edit</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endcol

    @endrow

@endsection