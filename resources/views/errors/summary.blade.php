@if ( $errors->count() > 0 )
    <blockquote>
    @foreach( $errors->all() as $e )
        {{ $e }}<br>
    @endforeach
    </blockquote>
@endif