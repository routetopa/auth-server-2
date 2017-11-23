<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Errors Language Lines
    |--------------------------------------------------------------------------
    |
    | The following messages are used to tell the user about various types
    | of errors.
    |
    */

    'meta_title' => 'Error',
    'title' => 'Error',
    'before_errors' => 'Sorry, we have encountered an error.',
    'after_errors' => '',

    'csrf' => [
        'meta_title' => 'Request expired',
        'title' => 'Request expired',
        'message' => 'The request is expired due timeout. Please go back, refresh the page and try again.',
    ],

    'facebook' => [
        'missing_email' => [
            'meta_title' => 'Invalid profile',
            'title' => 'Invalid profile',
            'before_errors' => 'Sorry, your account does not allow authentication to external sites.
                Please login on Facebook and visit this link: 
                <a href="https://www.facebook.com/settings?tab=account&section=email&view">https://www.facebook.com/settings?tab=account&amp;section=email&amp;view</a>.
                Check that you have set an email address and that <b>it has been verified</b>',
        ],
    ],

];
