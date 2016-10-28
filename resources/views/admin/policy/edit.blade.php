@extends( 'layouts.master' )

@section( 'title', 'Admin :: Policies' )

@section( 'heading', 'Edit Policy' )

@section( 'main' )

    @row
        <form class="col s12" method="post" action="{{ action( 'Admin\PolicyController@update', [ 'policy' => $policy ] ) }}">
            {{ method_field('PUT') }}
            @include( 'admin.policy.form', [ 'policy' => $policy ] )
        </form>
    @endrow

    @row
        <form class="col s12" method="post" action="{{ action( 'Admin\PolicyController@destroy', [ 'policy' => $policy ] ) }}">
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
