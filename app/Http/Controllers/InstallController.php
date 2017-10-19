<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Support\MessageBag;

/**
 * Dashboard for logged-in users.
 *
 * @package App\Http\Controllers
 */
class InstallController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware( 'guest' )->except( 'already_installed' );
        $this->middleware( 'install' )->except( [ 'already_installed', 'installed' ] );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'install.index' );
    }

    public function installed()
    {
        $email = session( 'email' );
        return view( 'install.installed' )
            ->withEmail( $email );
    }

    public function already_installed()
    {
        return view( 'install.already_installed' );
    }

    public function create_admin_do( Requests\CreateAdmin $request )
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt( $request->password );
        $user->roles = 'admin';
        $user->is_banned = false;
        $user->verified = true;

        $result = $user->save();

        if ( ! $result ) {
            return redirect()->action( 'InstallController@index' )
                ->withErrors( new MessageBag( [ trans( 'install.errors.cant_save' ) ] ) );
        }

        return redirect()->action( 'InstallController@installed' )
                ->withEmail( $user->email );
    }
}
