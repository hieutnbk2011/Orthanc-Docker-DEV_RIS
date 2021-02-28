<?php

ini_set('session.cookie_httponly', '1');
ini_set('session.cookie_samesite', '1');
ini_set('session.use_strict_mode', '1');
ini_set('session.cookie_secure', '1');
ini_set('session.cookie_samesite', 'Strict');

ini_set('upload_max_filesize', '4096M');
ini_set('max_execution_time', '300');
ini_set('memory_limit', '512M');
ini_set('post_max_size', '4096M');

define('DEBUG', true); //CONFIGME!
define('DEVENV', true); //CONFIGME!

return [

    /*
    |--------------------------------------------------------------------------
    | STUDY_COUNT_ARRAY
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'STUDY_COUNT_ARRAY' => array(1,2,5,10,25,50),
    'DEFAULT_ORTHANC_HOST' => 1,
    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'mysql_db',
    'DB_NAME' => 'laravel',
    'DB_USER' => 'root',
    'DB_PASS' => 'root',
    'DB_PORT' => '3306',
    'DB_CHARSET' => 'utf8',
    'COOKIE_RUNTIME' => 604800,
    'COOKIE_PATH' => '/',
    'COOKIE_DOMAIN' => env("COOKIE_ROOT") ,
    'COOKIE_SECURE' => true,
    'COOKIE_HTTP' => true,
    'SESSION_RUNTIME' => 86400,
    'COOKIE_SAMESITE' => 'Strict',
    'PATH_PLUPLOAD_TEMP' => '/tmp',
    'DEFAULT_OLD_STUDIES' => 50,
    'API_Authorization' => 'Bearer CURLTOKEN',
    'API_Token' => 'wxwzisme',
    'PATH_DCMTK' => '/usr/bin/', // the path in the Docker php-fpm container, which has that installed.
    'PATH_DICOM_TMP_PARENT' => realpath(dirname(__FILE__).'/../') . '/TMPUPLOADS',

];
