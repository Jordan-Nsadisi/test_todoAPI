<?php

return [

   /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

   'paths' => [
      'api/*',
      'sanctum/csrf-cookie',
      '/login',
      '/register'
   ],

   'allowed_methods' => ['*'],

   'allowed_origins' => [
      //dev mode, accepter toutes les origines
      env('CORS_ALLOWED_ORIGINS') === '*' ? '*' : explode(',', env('CORS_ALLOWED_ORIGINS', 'http://localhost:3000'))
   ][0] === '*' ? ['*'] : explode(',', env('CORS_ALLOWED_ORIGINS', 'http://localhost:3000')),

   'allowed_origins_patterns' => [
      // Pour les tunnels Expo et ngrok
      '/^https:\/\/.*\.ngrok\.io$/',
      '/^https:\/\/.*\.expo\.io$/',
      '/^https:\/\/.*\.exp\.direct$/',
      '/^exp:\/\/.*$/',
   ],

   'allowed_headers' => [
      'Accept',
      'Authorization',
      'Content-Type',
      'X-Requested-With',
      'X-CSRF-TOKEN',
      'X-Socket-ID',
   ],

   'exposed_headers' => [
      'X-Pagination-Count',
      'X-Pagination-Page',
      'X-Pagination-Limit',
   ],

   'max_age' => 0,

   'supports_credentials' => true,

];
