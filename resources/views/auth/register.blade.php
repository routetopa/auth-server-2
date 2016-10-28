@extends( 'layouts.master' )

@section( 'heading', 'New user' )

@section( 'heading', 'New user' )


@section( 'main' )

    @include( 'errors.summary' )

    @row
        @col( s12 )
            <div class="card">
                <div class="card-content">
                    <span class="card-title">
                        <i class="material-icons">group</i>
                        Register
                    </span>
                    <p>Excellent! We are glad you are joining us. We just need your email, later we will ask
                        you all needed details such as name, date of birth, and so on.</p>
                    @row
                    <form class="col s12" action="{{ url('/register') }}" method="POST">
                        {{ csrf_field() }}
                        @row
                            @col( s12 input-field )
                                {!! MForm::input( 'email' )->label( 'E-mail' )->value( old( 'email' ) ) !!}
                            @endcol
                            @col( s12 input-field )
                                {!! MForm::password( 'password' )->label( 'Choose a password' ) !!}
                            @endcol
                            @col( s12 input-field )
                                {!! MForm::password( 'password_confirmation' )->label( 'Confirm password' ) !!}
                            @endcol
                        @endrow

                        @row
                            @foreach( $policies as $policy )
                                @col( s12 input-field )
                                    <?php
                                        $uri = $policy->uri ?: '#';
                                        $mandatory = $policy->is_mandatory ? ' (mandatory)' : '';
                                    ?>
                                    {!! MForm::checkbox( "policy_{$policy->id}" )
                                        ->label( "I have read and accepted <a href=\"{$uri}\" target=\"_blank\">{$policy->title}</a>{$mandatory}")
                                        ->ghost( 0 )
                                        ->checked( old( "policy_{$policy->id}" ) ) !!}
                                @endcol
                            @endforeach
                        @endrow

                        @row( right-align )
                            @col( s12 )
                                {!! MForm::submit( 'Register' ) !!}
                            @endcol
                        @endrow
                    </form>
                    @endrow
                </div>
            </div>
        @endcol
    @endrow

@endsection
