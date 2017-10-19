@extends( 'layouts.master' )

@section( 'title', trans( 'install.already_installed.meta_title' ) )

@section( 'heading', trans( 'install.already_installed.title' ) )

@section( 'main' )

    @row
        @col( s12 )
            @lang( 'install.already_installed.message' )
        @endcol
    @endrow

@endsection