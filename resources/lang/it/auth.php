<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'Nome utente o password non validi.',
    'throttle' => 'Hai effettuato troppi tentativi di accesso. Potrai accedere nuovamente tra :seconds secondi.',

    'login' => [
	    'meta_title' => 'Login',
	    'title' => 'Benvenuto',
	    'login_card' => [
		    'title' => 'Log in',
		    'message' => 'Se sei registrato, puoi accedere utilizzando nome utente e password in tuo possesso.',
		    'action' => 'Accedi',
		    'email' => 'E-mail',
		    'password' => 'Password',
		    'remember_me' => 'Ricordami',
	    ],
	    'register_card' => [
		    'title' => 'Nuovo utente?',
		    'message' => 'Unisciti a noi e lavora con gli Open Data: crea, pubblica e discuti sulla nostra piattaforma.',
		    'action' => 'Registrati',
	    ],
	    'password_reset_card' => [
		    'title' => 'Password dimenticata?',
		    'message' => 'Possiamo inviarti una e-mail contenente un collegamento con cui procedere a reimpostare la password.',
		    'action' => 'Reimposta password',
	    ],
    ],

    'form' => [
	    'email' => 'E-mail',
	    'new_password' => 'Password',
	    'confirm_password' => 'Conferma password',
	    'action_reset' => 'Reimposta',
    ],

    'forgot' => [
	    'title' => 'Password dimenticata',
	    'meta_title' => 'Password dimenticata',
	    'action_title' => 'Reimposta password',
	    'action_message' => 'Inserisci il tuo indirizzo e-mail: ti invieremo una e-mail contenente un collegamento per reimpostare la tua password.',
    ],

    'reset' => [
	    'title' => 'Reimposta password',
	    'meta_title' => 'Reimposta password',
	    'action_title' => 'Nuova password',
	    'action_message' => 'Inserisci la tua e-mail e sceli la tua nuova password.',
    ],

    'register' => [
	    'title' => 'Nuovo utente',
	    'meta_title' => 'Nuovo utente',
	    'action_title' => 'Registrati',
	    'action_message' => 'Inserisci il tuo indirizzo email e sceglie una password. Riceverai una email con le istruzioni per confermare il tuo account.',
	    'accept' => 'Ho letto e accettato: <a href=":url" target=\"_blank\">:title</a>',
	    'accept_mandatory' => 'Ho letto e accettato: <a href=":url" target=\"_blank\">:title</a> (obbligatoria)',
	    'sent_message' => 'Ti abbiamo inviato una e-mail contenente un collegamento per verificare il tuo indirizzo e-mail.',
	    'sent_action' => 'Re-invia email di verifica',
	    'closed_message' => 'Spiacenti, le registrazioni sono chiuse.',
    ],

];