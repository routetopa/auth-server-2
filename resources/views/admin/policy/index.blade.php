@extends( 'layouts.master' )

@section( 'title', 'Admin :: Policies' )

@section( 'heading', 'Policies management' )

@section( 'main' )

    <div class="container">
    @row
        @col( s12 right-align )
            <a class="btn-floating btn-large waves-effect waves-light" href="{{ action( 'Admin\PolicyController@create' ) }}"><i class="material-icons">add</i></a>
        @endcol
    @endrow
    </div>

    @row

        @col( s12 )

            <table class="striped">
                <thead>
                    <tr>
                        <th data-field="title">Title</th>
                        <th>URI / Content</th>
                        <th data-field="created_at">Created</th>
                        <th data-field="updated_at">Updated</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach( $policies as $policy )
                    <tr>
                        <td>{{ $policy->title }}</td>
                        <td>
                            @if ( $policy->uri )
                                <i class="material-icons left">link</i>
                                {{ $policy->uri }}
                            @else
                                <i class="material-icons left">text_fields</i>
                                {{ str_limit( strip_tags( $policy->content ), 60 ) }}
                            @endif
                        <td>{{ $policy->created_at }}</td>
                        <td>{{ $policy->updated_at }}</td>
                        <td>
                            <a href="{{ action( 'Admin\PolicyController@edit', [ 'policy' => $policy ] ) }}" title="Edit policy"><i class="material-icons">mode edit</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endcol

    @endrow

@endsection