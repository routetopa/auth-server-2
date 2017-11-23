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

    'meta_title' => 'Errore',
    'title' => 'Errore',
    'before_errors' => 'Spiacenti, si è verificato un errore.',
    'after_errors' => '',

    'csrf' => [
        'meta_title' => 'Richiesta scaduta',
        'title' => 'Richiesta scaduta',
        'message' => 'La richiesta è scaduta perché è passato troppo tempo senza attività. Torna indietro, aggiorna la pagina e prova di nuovo.',
    ],

    'facebook' => [
        'missing_email' => [
            'meta_title' => 'Errore di autenticazione Facebook',
            'title' => 'Errore di autenticazione Facebook',
            'before_errors' => 'Spiacenti, purtroppo il tuo profilo Facebook non è sufficiente ad accedere.
                Per risolvere, accedi a Facebook e visita questo indirizzo: 
                <a href="https://www.facebook.com/settings?tab=account&section=email&view">https://www.facebook.com/settings?tab=account&amp;section=email&amp;view</a>,
                controlla di aver specificato un indirizzo email principale e che questo <b>sia stato verificato</b>.',
        ],
    ],

];
