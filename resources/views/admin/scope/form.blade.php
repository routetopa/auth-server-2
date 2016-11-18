{{ csrf_field() }}

@row
    @col( s12 input-field )
        {!! MForm::input( 'scope' )->label( 'Scope' )->value( $scope->scope ) !!}
    @endcol
@endrow

@row
    @col ( s12 )
        {!! MForm::checkbox( 'is_default' )->label( 'Default' )->checked( $scope->is_default )->ghost( 0 ) !!}
    @endcol
@endrow

@row
    @col( s12 right-align )
        {!! MForm::submit( 'Save' ) !!}
    @endcol
@endrow