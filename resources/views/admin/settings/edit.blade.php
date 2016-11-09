@extends( 'layouts.master' )

@section( 'title', 'Admin :: Settings' )

@section( 'heading', 'Settings' )

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
        <h2>@lang( 'settings.api_check.heading' )</h2>
        @col( s12 )
            {!! MForm::checkbox( 'settings_api_check_jsonp_enable', $settings->get( 'api_check_jsonp_enable' )->value )
                ->label( trans( 'settings.api_check_jsonp_enable.label' ) )
                ->ghost( 0 ) !!}
        @endcol
        @col( s12 )
            {!! MForm::checkbox( 'settings_api_check_cors_enable', $settings->get( 'api_check_cors_enable' )->value )
                ->label( trans( 'settings.api_check_cors_enable.label' ) )
                ->ghost( 0 ) !!}
        @endcol

    @endrow

    @row
        @col( s12 right-align )
            {!! MForm::submit( 'Save' ) !!}
        @endcol

    @endrow

    </form>

@endsection