PHP Marketplace SSO
===================

A simple demonstration of how to achieve Google Apps Marketplace zero-click SSO using PHP.

[Instance](https://php-marketplace-sso.appspot.com)

[Google Apps Markeplace entry](https://apps.google.com/marketplace/app/jjanckmgjkjodmpaiopmbbhdmmahaooa)

Setup
-----

### Marketplace project
1. Create a project in the [Google Developers Console](https://console.developers.google.com)
2. Enable Google Apps Marketplace SDK
3. Create a Web Client ID
4. Make sure to fill the authorized redirect URL with your App Engine instance's
5. Retrieve the client_id.json and place it under a 'secrets' directory
6. Add Universal Navigation link in the Google Apps Marketplace SDK configuration (This is essential to enable zero-click SSO)
7. Add required description, icons…

### App Engine
1. Enable App Engine in the [Google Developers Console](https://console.developers.google.com)
2. Language: PHP

### Marketplace publication
1. Go to the [Chrome Web Store Developer Dashboard](https://chrome.google.com/webstore/developer/dashboard)
2. Create a new item
3. Import your publication ZIP
4. Fill required fields and upload assets (icons, screenshots, promo images…)
5. Publish unlisted

Install
-------

### Composer
```
composer install
```

TODO
----

- Port shell scripts to PHP
- Generate Google Apps Marketplace manifest.json from app properties

License
-------

Copyright (C)2016 GPC.solutions

### Author
Raphaël Doursenaud (@rdoursenaud)
