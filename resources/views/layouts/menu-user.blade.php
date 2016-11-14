<li>
    <a class="dropdown-button" href="#!" data-activates="dropdown-user">
        <i class="material-icons left">face</i>
        {{ Auth::user()->email  }}
    </a>
    <ul id="dropdown-user" class="dropdown-content">
        <li>
            <a href="{{ action( 'ProfileController@edit' ) }}">@lang( 'menu.user.profile' )</a></li>
    </ul>
</li>
