<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\MessageBag;

class MessageController extends Controller
{

    public function error() {
        $errorCode = session( 'error_code' );

        if ( ! $errorCode ) {
            return redirect('/');
        }

        return view( 'errors.generic' )
            ->withBeforeErrors( Lang::has( "errors.{$errorCode}.before_errors" ) ? "errors.{$errorCode}.before_errors" : 'errors.before_errors' )
            ->withAfterErrors( Lang::has( "errors.{$errorCode}.after_errors" ) ? "errors.{$errorCode}.after_errors" : null )
            ->withErrors( session('errors'), new MessageBag() )
            ->withHeading( Lang::has( "errors.{$errorCode}.title" ) ? "errors.{$errorCode}.title" : 'errors.title' )
            ->withTitle( Lang::has( "errors.{$errorCode}.meta_title" ) ? "errors.{$errorCode}.meta_title" : 'errors.meta_title' );
    }

}