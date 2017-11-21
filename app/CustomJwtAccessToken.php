<?php

namespace App;

use OAuth2\ResponseType\JwtAccessToken;

class CustomJwtAccessToken extends JwtAccessToken
{

    protected function createPayload($client_id, $user_id, $scope = null)
    {
        $payload = parent::createPayload($client_id, $user_id, $scope);
        $payload['email'] = \App\User::where('username', $user_id)->firstOrFail()->email;

        return $payload;
    }

}