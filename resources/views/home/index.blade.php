@extends( 'layouts.master' )

@section( 'title', 'Welcome' )

@section( 'heading', 'Welcome' )

@section( 'main' )

    @row

        @col( s12 )
            <p>You are logged in.</p>
        @endcol

    @endrow

    @row
        @col( s12 )
            @foreach ( $clients as $client )
                @if ( $client->init_oauth_uri )
                    <a class="waves-effect waves-light btn" href="{{ $client->init_oauth_uri }}">
                        <i class="material-icons left">https</i>
                        Go to {{ $client->title ?: $client->id }}
                    </a>
                @elseif ( $client->home_uri )
                    <a class="waves-effect waves-light btn" href="{{ $client->home_uri }}">
                        <i class="material-icons left">submit</i>
                        Go to {{ $client->title ?: $client->id }}
                    </a>
                @endif
            @endforeach
        @endcol
    @endrow

@endsection
