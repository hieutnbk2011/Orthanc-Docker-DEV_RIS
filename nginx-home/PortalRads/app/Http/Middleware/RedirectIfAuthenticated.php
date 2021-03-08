<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use ReallySimpleJWT\Build;
use ReallySimpleJWT\Secret;
use ReallySimpleJWT\Helper\Validator;
use ReallySimpleJWT\Encoders\EncodeHS256;
use ReallySimpleJWT\Token;
use ReallySimpleJWT\Parse;
use ReallySimpleJWT\Jwt;
use ReallySimpleJWT\Decode;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {

        $myip = $_SERVER['REMOTE_ADDR']; // https://stackoverflow.com/questions/3003145/how-to-get-the-client-ip-address-in-php
        $data = array("user_id" => '', "mrn" => '',  "orthanc_uuid" => '', "StudyInstanceUID" => '', "IPaddress" => $myip);
        $payload = [

        'iss' => 'Orthanc PACS',
        'sub' => 'Viewer Token',
        'iat' => time(),
        'uid' => 1,
        'exp' => time() + 60 * 5,
        'data' => $data

        ];

        $secret = 'Hello&MikeFooBar123';
        $token = Token::customPayload($payload, $secret); // will return a JWT token string
        $jwt = new Jwt($token, $secret);  // an object
        Log::info("Valid:  " . (Token::validate($token, $secret))?"Valid":"Not Valid");
        $parse = new Parse($jwt, new Decode());
        $parsed = $parse->parse();
        Log::info("Cookie JWT set in Redirect If Authenticated:");
        Log::info($parsed->getHeader());
        Log::info($parsed->getPayload());

        setcookie("JWTVIEWER", $token, [

            'expires' => time() + config('myconfigs.SESSION_RUNTIME'),
            'path' => config('myconfigs.COOKIE_PATH'),
            'domain' => config('myconfigs.COOKIE_DOMAIN'),
            'secure' => config('myconfigs.COOKIE_SECURE'),
            'httponly' => config('myconfigs.COOKIE_HTTP'),
            'samesite' => config('myconfigs.COOKIE_SAMESITE'),
        ]);

        if (!isset($_COOKIE['laravel_cookie_consent'])) {

            Log::info("laravel_cookie_consent not set");
            return redirect('/', ["laravel_cookie_consent" => false]);

        }
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            if (Auth::guard($guard)->check()) {

                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
