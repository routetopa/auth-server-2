@extends( 'layouts.master' )

@section( 'title', trans( $title ) )

@section( 'heading', trans( $heading ) )

@section( 'main' )

    @if ( isset( $before_errors ) )
        @lang( $before_errors )
    @endif

    @if ( isset( $errors ) )
        @include( 'errors.summary', [ 'errors' => $errors ] )
    @endif

    @if ( isset( $after_errors ) )
        @lang( $after_errors )
    @endif

@endsection