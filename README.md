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

## Configuration

Go to the URL where you installed the webapp and login with credentials you set during installation.

Go to **Administration > Scopes**. A scope is a way to define a set of operations that a client is allowed to perform.
Click the *Add* button and fill the form:
  - Scope: **authenticate**
  - Default: **yes**

Go to **Administration > Clients**. A client is a website or application that can use the authentication server.
Click the *Add* button and fill the form:
  - Client Id: the same client id that you will use in the authentication client (e.g.: **spod**)
  - Client secret: a value that the client will use to authenticate itself (e.g. a random string, hard to guess)
  - Redirect URI: the OAuth redirect URI (it depends on the OAuth2 Client implementation)
  - Grant types: **authorization_code**
  - Scope: **authenticate** (the same created earlier)
  - Initialize OAuth flow URI: the URL that starts the authentication flow client-side (e.g. the login URL for the
  client) 

You leave other fields blank.

## Importing accounts from previous authentication system

The Authentication Server 2 can import accounts from CSV files having this format:

`email,is_admin,is_verified`

Where:
  - `email` is the e-mail address to import,
  - `is_admin` is a boolean value, should be `1` if the user is an administrator, `0` otherwise
  - `is_verified` is a boolean value, should be `1` if the user email was verified, `0` otherwise
  
The following snippet is an example of how you can generate the CSV file from the database table of the
old Authentication Server:

````sql
SELECT email, is_admin, is_verified 
  FROM users 
  INTO OUTFILE '/tmp/user_export.csv'
  FIELDS TERMINATED BY ','
  OPTIONALLY ENCLOSED BY '"'
  LINES TERMINATED BY '\n';
````

Once you have your CSV file, login as administrator on the new Authentication Server and go to`/admin/import/users`.

## License

The software is licensed under MIT License.