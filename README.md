# ROUTE-TO-PA Authentication Server 2

Provides an authorization server via OAuth2 and identity server via OpenID Connect.

## Requirements

## Installation

> **Note**: This is a development version. These instruction will guide you 
> to setup a development/testing environment.

The webapp can be deployed in any directory, but the `DocumentRoot` of
Apache must point to the `/public` directory.
To accomplish this, in this guide we will see two deployments methods: using
a virtual host and using an alias. 

1. Prepare the webapp:
    ````bash
    git clone https://github.com/routetopa/auth-server-2
    cd auth-server-2
    composer update
    cp .env.example .env
    php artisan key:generate
    ````

1. Edit file .env and set the following parameters:
    - APP_URL: the URL of the webapp. Of course, it will depend on the deployment method (Virtual Host or Alias)
    - DB_*
    - MAIL_*

1. Create a the database and its user. Execute these commands in your SQL client:
    ````sql
    CREATE DATABASE DB_DATABASE;
    CREATE USER 'DB_USERNAME'@'localhost' IDENTIFIED BY 'DB_PASSWORD';
    GRANT ALL PRIVILEGES ON DB_DATASE.* TO 'DB_USERNAME'@'localhost';
    FLUSH PRIVILEGES;
    ````
    Please note that DB_DATABASE, DB_USERNAME and DB_PASSWORD are the same set in `.env`.

1. Create the first user. Launch `php artisan tinker` from the directory where you deployed the webapp and execute this:
    ````php
    $user = new \App\User;
    $user->email = 'YOUR_EMAIL';
    $user->is_banned = 0;
    $user->roles = 'admin';
    $user->password = bcrypt( 'YOUR_PASSWORD' );
    $user->save();
    exit
    ````

### Deploy as Virtual Host

1. Customize and add the following snippet to you Apache configuration:

    ````xml
    <VirtualHost *:80>
      ServerName oauth2
      DocumentRoot "/path/to/auth-server-2/public"
      <Directory  "/path/to/auth-server-2/public/">
          Options Indexes FollowSymLinks MultiViews
          AllowOverride All
          Require local
      </Directory>
    </VirtualHost>
    ````

### Deploys as Alias

1. Customize and add the following snippet to you Apache configuration:

    ````xml
    Alias /oauth2 "/path/to/auth-server-2/public/" 

    <Directory "/path/to/auth-server-2/public/">
      Options Indexes FollowSymLinks MultiViews
      AllowOverride all
      Require local
      Order Allow,Deny
      Allow from all
    </Directory>
    ````

2. Add the following line to the `.htaccess` file: 

	````
	.htaccess RewriteBase /oauth2
    ````
    
Please note that the /oauth2 path is the same specified as alias.

## License

The software is licensed under MIT License.