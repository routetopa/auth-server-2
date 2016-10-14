<?php

namespace App\Http\Controllers;

use App\Client;
use App\Scope;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use OAuth2;

/**
 * Manages OAuth2 and OpenIDConnect flows.
 *
 * @package App\Http\Controllers
 */
class OAuth2Controller extends Controller
{

	function auth( Request $request )
	{
		$request  = OAuth2\HttpFoundationBridge\Request::createFromRequest( $request );
		$response = new OAuth2\HttpFoundationBridge\Response();

		$server = App::make( 'oauth2' );

		$server->setScopeUtil( new OAuth2\Scope( [
			'supported_scopes' => Scope::all( 'scope' )->pluck( 'scope' )->toArray(),
		] ) );

		// validate the authorize request
		if ( ! $server->validateAuthorizeRequest( $request, $response ) )
		{
			return $response;
		}

		// display an authorization form
		if ( empty( $_POST ) ) {
			$oauthClient = Client::find( $request->query( 'client_id', null ) );
			$scope = Scope::find( $request->query( 'scope', null ) );

			return view( 'oauth2.authorize' )
				->withClient( $oauthClient )
				->withScope( $scope )
				->withUser( Auth::user() );
		}

		// print the authorization code if the user has authorized your client
		$is_authorized = ( $_POST['authorized'] === 'yes' );
		$server->handleAuthorizeRequest( $request, $response, $is_authorized, Auth::user()->username );

		return $response;
	}

	function token( Request $request )
	{
		$server = App::make( 'oauth2' );
		$server->addGrantType(
			new OAuth2\GrantType\AuthorizationCode( new OAuth2\Storage\Pdo( App::make( 'db' )->getPdo() ) )
		);

		$bridgedRequest  = OAuth2\HttpFoundationBridge\Request::createFromRequest( $request );
		$bridgedResponse = new OAuth2\HttpFoundationBridge\Response();

		$bridgedResponse = $server->handleTokenRequest( $bridgedRequest, $bridgedResponse );

		return $bridgedResponse;
	}

	function userinfo( Request $request )
	{
		$server = App::make( 'oauth2' );

		// Do NOT use ::createFromRequest as it does not distinguish between query and post params
		$bridgedRequest = OAuth2\HttpFoundationBridge\Request::createFromGlobals();
		$bridgedResponse = new OAuth2\HttpFoundationBridge\Response();

		if ( $server->verifyResourceRequest( $bridgedRequest, $bridgedResponse ) )
		{
			$token = $server->getAccessTokenData( $bridgedRequest );

			$user_id = $token[ 'user_id' ];
			$user = User::whereUsername( $user_id )->first();

			return Response::json( array(
				'private' => 'stuff',
				'email' => $user->email,
				'user_id' => $token[ 'user_id' ],
				'client'  => $token[ 'client_id' ],
				'expires' => $token[ 'expires' ],
			));
		}
		else
		{
			return Response::json( array(
				'error' => 'Unauthorized'
			), $bridgedResponse->getStatusCode() );
		}
	}

}