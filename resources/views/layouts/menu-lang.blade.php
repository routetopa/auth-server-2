<li>
    <a class="dropdown-button" href="#!" data-activates="dropdown-lang">
        <i class="material-icons left">translate</i>
        {{ App::getLocale() }}
    </a>
    <ul id="dropdown-lang" class="dropdown-content">
        @foreach( [ 'en', 'it' ] as $lang )
            <li>
                <form action="{{ url( '/lang', [ 'lang' => $lang ] ) }}" method="post">
                    <input type="hidden" name="backuri" value="{{ Request::path() }}">
                    {{ csrf_field() }}
                    <a href="#" onclick="this.parentNode.submit();">
                        <i class="material-icons left">{{ App::isLocale( $lang ) ? 'radio_button_checked' : 'radio_button_unchecked'  }}</i>
                        {{ $lang }}
                    </a>
                </form>
            </li>
        @endforeach
    </ul>
</li>