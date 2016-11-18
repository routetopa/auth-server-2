{{ csrf_field() }}

@row
    @col( s12 input-field )
        {!! MForm::input( 'title' )->label( 'Title' )->value( $policy->title ) !!}
    @endcol
@endrow

@row
    @col ( s12 input-field )
        {!! MForm::input( 'uri' )->label( 'URI' )->value( $policy->uri ) !!}
    @endcol
@endrow

@row
    @col ( s12 input-field )
        {!! MForm::input( 'content' )->label( 'Content' )->value( $policy->content ) !!}
    @endcol
@endrow

@row
    @col ( s12 )
        {!! MForm::checkbox( 'is_mandatory' )->label( 'Mandatory' )->checked( $policy->is_mandatory )->ghost( 0 ) !!}
    @endcol
@endrow

@row
    @col( s12 right-align )
        {!! MForm::submit( 'Save' ) !!}
    @endcol
@endrow