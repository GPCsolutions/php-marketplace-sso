<?php

// Autoload Google API Client from Composer
require __DIR__ . '/vendor/autoload.php';

// Instantiate a new Google_Client object
$client = new Google_Client();

// Get auth config from developer console json file
$client->setAuthConfigFile('secrets/client_id.json');

// Set minimal scope for authentication
$client->setScopes(array(
    Google_Service_Oauth2::USERINFO_EMAIL,
    Google_Service_Oauth2::USERINFO_PROFILE
));

// Set redirect URL to self. Hardcoded for simplicity and readability.
$client->setRedirectUri('https://php-marketplace-sso.appspot.com');

// Prepare auth URL
$auth_url = $client->createAuthUrl();

if (isset($_GET['code'])) {
    // We have returned from auth URL
    $client->authenticate($_GET['code']);

    // Retrieve the access token
    $access_token = $client->getAccessToken();

    // Verify login server-side
    $login_ticket = $client->verifyIdToken();

    if ($login_ticket) {
        // We successfully authenticated the user, let's display some infos about him
        $login_attributes = $login_ticket->getAttributes();
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Hello, world!</title>
        </head>
        <body>
        <?php
        echo 'Google user ID: ', $login_attributes['payload']['sub'], '<br>';
        echo 'Email: ', $login_attributes['payload']['email'], '<br>';
        if (isset($login_attributes['payload']['hd'])) {
            echo 'Google Apps for Work domain: ', $login_attributes['payload']['hd'], '<br>';
        }
        echo 'Raw:', '<br>';
        var_dump($login_attributes);
        ?>
        </body>
        </html>
        <?php
    } else {
        // Token is forged, abort
        header('HTTP/1.0 403 Forbidden');
    }
} else {
    // Try to achieve zero click SSO.
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
}
