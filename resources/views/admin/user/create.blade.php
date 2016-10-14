@extends( 'layouts.master' )

@section( 'title', 'Admin :: Users' )

@section( 'heading', 'Create user' )

@section( 'main' )

    @row
        <form class="col s12" method="post" action="{{ action( 'Admin\UserController@store', [ 'user' => $user ] ) }}">
            @include( 'admin.user.form', [ 'user' => $user ] )
        </form>
    @endrow

@endsection
