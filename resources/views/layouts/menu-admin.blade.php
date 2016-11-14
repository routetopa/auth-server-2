<li>
    <a class="dropdown-button" href="#!" data-activates="dropdown-admin">
        <i class="material-icons left">settings</i>
        @lang( 'menu.admin.administration' )
    </a>
    <ul id="dropdown-admin" class="dropdown-content">
        <li>
            <a href="{{ action( 'Admin\UserController@index' ) }}">
                <i class="material-icons left">people</i>@lang( 'menu.admin.user' )</a></li>
        <li>
            <a href="{{ action( 'Admin\PolicyController@index' ) }}">
                <i class="material-icons left">description</i>@lang( 'menu.admin.policy' )</a></li>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="{{ action( 'Admin\ClientController@index' ) }}">
                <i class="material-icons left">https</i>@lang( 'menu.admin.client' )</a></li>
        <li>
            <a href="{{ action( 'Admin\ScopeController@index' ) }}">
                <i class="material-icons left">https</i>@lang( 'menu.admin.scope' )</a></li>
        <li class="divider"></li>
        <li>
            <a href="{{ action( 'Admin\SettingController@edit' ) }}">
                <i class="material-icons left">build</i>@lang( 'menu.admin.setting' )</a></li>
    </ul>
</li>