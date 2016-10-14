<li>
    <a class="dropdown-button" href="#!" data-activates="dropdown-admin">
        <i class="material-icons left">settings</i>
        Administration
    </a>
    <ul id="dropdown-admin" class="dropdown-content">
        <li>
            <a href="{{ action( 'Admin\UserController@index' ) }}">
                <i class="material-icons left">people</i>Users</a></li>
        <li class="divider"></li>
        <li>
            <a href="{{ action( 'Admin\ClientController@index' ) }}">
                <i class="material-icons left">https</i>Clients</a></li>
        <li>
            <a href="{{ action( 'Admin\ScopeController@index' ) }}">
                <i class="material-icons left">https</i>Scopes</a></li>
        <li class="divider"></li>
        <li>
            <a href="{{ action( 'Admin\SettingController@edit' ) }}">
                <i class="material-icons left">build</i>Settings</a></li>
    </ul>
</li>