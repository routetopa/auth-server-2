@extends( 'layouts.master' )

@section( 'title', trans( 'settings.meta_title' ) )

@section( 'heading', trans( 'settings.title' ) )

@section( 'main' )

    <form class="col s12" method="post" action="{{ action( 'Admin\SettingController@update' ) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

    @row
        @col( s12 input-field )
            {!! MForm::input( 'settings_instance_title' )
                ->label( trans( 'settings.instance_title.label' ) )
                ->value( $settings->get( 'instance_title' )->value ) !!}
        @endcol
    @endrow

    @row
        @col( s12 )
            {!! MForm::checkbox( 'settings_registration_open', $settings->get( 'registration_open' )->value )
                ->label( trans( 'settings.registration_open.label' ) )
                ->ghost( 0 ) !!}
        @endcol
    @endrow

    @row
        @col( s12 right-align )
            {!! MForm::submit( trans( 'settings.action' ) ) !!}
        @endcol

    @endrow

    </form>

@endsection