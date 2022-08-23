<?php

return [
    /*
     * Base url login page
     */
    'url' => 'login',

    /*
     * Usage user model for authentication
     */
    'user_model' => App\Models\User::class,

    /*
     * Lifetime of verification code
     * in minutes
     */
    'code_lifetime' => 5,
];
