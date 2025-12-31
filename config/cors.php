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
      //utilisation des variables d'environnement
      env('FRONTEND_URL', 'http://localhost:3000'),

      // Next.js dev mode
      'http://localhost:3000',
      'http://127.0.0.1:3000',


      //react Native dev mode
      'http://localhost:8081',
      'http://127.0.0.1:8081',

      //expo Development
      'http://localhost:19006',
      'http://127.0.0.1:19006',
      'exp://localhost:19000',
      'exp://127.0.0.1:19000',

      //local mode dev mobile
      'http://192.168.0.0/16',
   ],

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
