{{ csrf_field() }}

@row
    @col( s6 input-field )
        {!! MForm::input( 'client_id' )->label( 'Client Id' )->value( $client->client_id ) !!}
    @endcol
    @col( s6 input-field )
        {!! MForm::input( 'client_secret' )->label( 'Client secret' )->value( $client->client_secret ) !!}
    @endcol
@endrow

@row
    @col( s12 input-field )
        {!! MForm::input( 'redirect_uri' )->label( 'Redirect URI' )->value( $client->redirect_uri ) !!}
    @endcol
@endrow

@row
    @col( s12 input-field )
        {!! MForm::input( 'grant_types' )->label( 'Grant types' )->value( $client->grant_types ) !!}
    @endcol
@endrow

@row
    @col( s12 input-field )
        {!! MForm::input( 'scope' )->label( 'Scope' )->value( $client->scope ) !!}
    @endcol
@endrow

@row
    @col( s12 input-field )
        {!! MForm::input( 'user_id' )->label( 'User Id' )->value( $client->user_id ) !!}
    @endcol
@endrow

@row
    @col( s12 right-align )
        {!! MForm::submit( 'Save' ) !!}
    @endcol
@endrow