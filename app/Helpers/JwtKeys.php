<?php

namespace App\Helpers;

use App\Setting;
use Illuminate\Support\Facades\Storage;

class JwtKeys
{

    const PUBLIC_NAME = 'public_name';
    const PRIVATE_NAME = 'private_name';

    public function makeKeys( $filename = null )
    {
        // Generate a keys pair with default values
        $res = openssl_pkey_new();

        if ( ! $res )
        {
            return false;
        }

        // Extract private key
        openssl_pkey_export( $res, $private_key );

        // Extract public key
        $public_key = openssl_pkey_get_details( $res );
        $public_key = $public_key[ "key" ];

        // Use current time in filename
        if ( ! $filename )
        {
            $filename = date('YmdHi');
        }

        // Save keys to disk
        $public_name = "keys_{$filename}_pub.pem";
        $private_name = "keys_{$filename}_priv.pem";
        Storage::put( $public_name, $public_key );
        Storage::put( $private_name, $private_key );

        return [
            self::PUBLIC_NAME => $public_name,
            self::PRIVATE_NAME => $private_name,
        ];
    }

    public function setKeys( $filenames = null )
    {
        $public_name_key = self::PUBLIC_NAME;
        $private_name_key = self::PRIVATE_NAME;

        // Save keys paths to Settings
        $public_setting = Setting::find( 'key_public' );
        $public_setting->value =  storage_path( "app/{$filenames[$public_name_key]}" );
        $result = $public_setting->save();

        $private_setting = Setting::find( 'key_private' );
        $private_setting->value = storage_path( "app/{$filenames[$private_name_key]}" );
        $result &= $private_setting->save();

        // Enable JWT in settings
        $jwt_setting = Setting::find( 'jwt_enable' );
        $jwt_setting->value = true;
        $result &= $jwt_setting->save();

        return $result;
    }

}