{{ csrf_field() }}

@row
    @col( s10 input-field )
        {!! MForm::input( 'email' )->label( 'E-mail' )->value( $user->email ) !!}
    @endcol
    @col( s2 input-field )
        @if ( $user->id )
        {!! MForm::input( 'id' )->label( 'Id' )->value( $user->id )->disabled() !!}
        @endif
    @endcol
@endrow

@row
    @col( s6 input-field )
        {!! MForm::password( 'password' )->label( 'Password' ) !!}
    @endcol
    @col( s6 input-field )
        {!! MForm::password( 'password_confirm' )->label( 'Confirm password' ) !!}
    @endcol
@endrow

@row
    @col ( s12 )
        {!! MForm::checkbox( 'is_banned' )->label( 'This user is banned' )->checked( $user->is_banned )->ghost( 0 ) !!}
    @endcol
@endrow

@row
    @col ( s12 )
        {!! MForm::checkbox( 'is_admin' )->label( 'This user is <div class="chip">admin</div>' )->checked( $user->isAdmin() )->ghost( 0 ) !!}
    @endcol
@endrow

@row
    @col( s12 right-align )
        {!! MForm::submit( 'Save' ) !!}
    @endcol
@endrow