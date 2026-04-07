<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default admin credentials (used by AdminCredentialSeeder)
    |--------------------------------------------------------------------------
    |
    | Override in .env for local/production. Change the password immediately
    | after first deploy if you use defaults.
    |
    */

    'email' => env('ADMIN_EMAIL', 'admin@example.com'),

    'password' => env('ADMIN_PASSWORD', 'password'),

];
