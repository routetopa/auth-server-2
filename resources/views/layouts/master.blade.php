<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ url( '/css/app.css' ) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield( 'title' )</title>
</head>

<body>

<header>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="{{ url( '/' ) }}" class="brand-logo">ROUTE-TO-PA</a>
                <ul id="nav-mobile" class="right">
                    @if ( Auth::check() )
                        @include( 'layouts.menu-user' )
                        @if ( Auth::user()->isAdmin() )
                            @include( 'layouts.menu-admin' )
                        @endif
                        <li>
                            <a class="modal-trigger" href="#logout_modal">
                                <i class="material-icons left">exit_to_app</i>
                                Logout
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>

<main>
    @if ( View::hasSection( 'heading' ) )
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h1>@yield( 'heading' )</h1>
                </div>
            </div>
        </div>
    @endif

    @section( 'stretch' )
        <div class="container">
            @yield( 'main' )
        </div>
    @show
</main>

<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <img src="/img/eu-flag.svg" style="height: 2em;">
            </div>
            <div class="col s4">
                <p>
                    This project has received funding from <i>European Union's Horizon 2020 research and
                        innovation programme</i> under grant agreement No 645860.
                </p>
            </div>
            <div class="col s4 offset-s4">
                <ul class="links-social right-align">
                    <li><a target="_blank" href="http://www.routetopa.eu" title="The ROUTE-TO-PA website"><i class="fa fa-desktop small" aria-hidden="true"></i></a></li>
                    <li><a target="_blank" href="https://www.facebook.com/routetopa" title="Facebook"><i class="fa fa-facebook-square small" aria-hidden="true"></i>
                        </a></li>
                    <li><a target="_blank" href="https://twitter.com/RouteToPA" title="Twitter"><i class="fa fa-twitter-square small" aria-hidden="true"></i></a></li>
                    <li><a target="_blank" href="https://www.linkedin.com/groups/8268551/profile" title="LinkedIn"><i class="fa fa-linkedin-square small" aria-hidden="true"></i></a></li>
                    <li><a target="_blank" href="https://www.youtube.com/channel/UCLQVcgwaYCmEiBRXAcz7S5A" title="YouTube"><i class="fa fa-youtube-square small" aria-hidden="true"></i></a></li>
                </ul>
                </p>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">

        </div>
    </div>
</footer>

@include( 'auth.logout' )

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
<script src="{{ url( '/js/app.js' ) }}"></script>
</body>
</html>