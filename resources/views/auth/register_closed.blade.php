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
				<p>Sorry, registrations are closed.</p>
			</div>
		</div>
	@endcol
@endrow

@endsection
