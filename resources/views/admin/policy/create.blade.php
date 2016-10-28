@extends( 'layouts.master' )

@section( 'title', 'Admin :: Policies' )

@section( 'heading', 'Create Policy' )

@section( 'main' )

    @row
        <form class="col s12" method="post" action="{{ action( 'Admin\PolicyController@store', [ 'policy' => $policy ] ) }}">
            @include( 'admin.policy.form', [ 'policy' => $policy ] )
        </form>
    @endrow

@endsection
