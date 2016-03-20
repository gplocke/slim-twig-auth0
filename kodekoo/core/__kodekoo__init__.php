<?php namespace kodekoo\core;

/**
 * This file may not be redistributed in whole or significant part.
 * ---------------- THIS IS NOT FREE SOFTWARE ----------------
 *
 *
 * @file       	__kodekoo__init__.php
 * @package    	Bootstrap Web Application Products
 * @company     Kodekoo <kodekoolabs@gmail.com>
 * @programmer	Rizki Wisnuaji, drg., M.Kom. <rizkiwisnuaji@comestoarra.com>
 * @copyright  	2016 Kodekoo. All Rights Reserved.
 * @license    	http://kodekoo.com/license
 * @version    	Release: @1.0@
 * @framework  	http://slimframework.com
 *
 *
 * ---------------- THIS IS NOT FREE SOFTWARE ----------------
 * This file may not be redistributed in whole or significant part.
 **/

use Carbon\Carbon as KodekooCarbon;
use helpers\KodekooSession;
use Slim\Http\Request;
use Slim\Http\Response;
use Twig_Extension_Debug;

require_once realpath ( "kodekoo/core/__kodekoo__constant__.php" );

KodekooSession::init();

$kodekoo['config'] = [

    'debug'                             => true,

    'log.enabled'                       => true,

    'mode'                              => ENVIRONMENT,

    'routes.case_sensitive'             => true,

    'determineRouteBeforeAppMiddleware' => true,

    'displayErrorDetails'               => true, // set to false in production

];

$app = new \Slim\App( $kodekoo['config'] );

$container = $app->getContainer();

$app->add( function ( Request $request, Response $response, callable $next ) {

    $uri = $request->getUri();
    $path = $uri->getPath();

    if ( $path != '/' && substr ( $path, -1 ) == '/' ) :

        // permanently redirect paths with a trailing slash
        // to their non-trailing counterpart
        $uri = $uri->withPath( substr ( $path, 0, -1 ) );
        return $response->withRedirect( (string)$uri, 301 );

    endif;

    return $next ( $request, $response );

});

/*
|--------------------------------------------------------------------------
| Twig
|--------------------------------------------------------------------------
|
| Descriptions
|
*/
$container['view'] = function ( $container ) {

    $view = new \Slim\Views\Twig( __DIR__ . '/../../templates/', [
        'cache'         => __DIR__ . '/../../tmp/cache/templates/',
        'debug'         => true,
        'auto_reload'   => true
    ]);

    $view->addExtension( new \Slim\Views\TwigExtension ( $container->get('router'), $container->get('request')->getUri() ) );
    $view->addExtension( new Twig_Extension_Debug() );

    return $view;

};

/*
|--------------------------------------------------------------------------
| CSRF
|--------------------------------------------------------------------------
|
| https://akrabat.com/slim-csrf-with-slim-3/
| https://github.com/slimphp/Slim-Csrf
|
*/
$app->add( new \Slim\Csrf\Guard() );

$container['csrf'] = function ( $container ) {

    $guard = new \Slim\Csrf\Guard();
    $guard->setFailureCallable( function ( $request, $response, $next ) {

        $request = $request->withAttribute( "csrf_status", false );

        return $next ( $request, $response );

    });

    return $guard;

};

/*
|--------------------------------------------------------------------------
| FLASH
|--------------------------------------------------------------------------
|
| Descriptions
|
*/
$container['flash'] = function ( $container ) {

    return new \Slim\Flash\Messages;

};

/*
|--------------------------------------------------------------------------
| MONOLOG
|--------------------------------------------------------------------------
|
| Descriptions
|
*/
$container['logger'] = function ( $container ) {

    $logger = new \Monolog\Logger( 'kodekoo-app' );
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler(__DIR__ . '/../../tmp/logs/kodekoo.log', \Monolog\Logger::DEBUG));

    return $logger;

};

/*
|--------------------------------------------------------------------------
| JSON RENDER
|--------------------------------------------------------------------------
|
| Descriptions
|
*/
$container['jsonRender'] = function( $container ) {

    $view = new \helpers\JsonRenderer();

    return $view;

};

/*
|--------------------------------------------------------------------------
| JSON REQUEST
|--------------------------------------------------------------------------
|
| Descriptions
|
*/
$container['jsonRequest'] = function ( $container ) {

    $jsonRequest = new \helpers\JsonRequest();

    return $jsonRequest;

};

/*
|--------------------------------------------------------------------------
| GLOBAL HELPER
|--------------------------------------------------------------------------
|
| Descriptions
|
*/
$container['globalhelper'] = function ( $container ) {

    $globalhelper = new \helpers\GlobalHelper();

    return $globalhelper;

};

/*
|--------------------------------------------------------------------------
| SENTINEL
|--------------------------------------------------------------------------
|
| https://cartalyst.com/manual/sentinel/2.0#native
|
*/
$container['sentinel'] = function ( $container) {

    return ( new \Cartalyst\Sentinel\Native\Facades\Sentinel() )->getSentinel();

};

/*
|--------------------------------------------------------------------------
| Carbon
|--------------------------------------------------------------------------
|
| @documentation    https://github.com/briannesbitt/Carbon
| @example  KodekooCarbon::now(TIMEZONE);
|
*/
$container['timezone'] = function ( $container ) {

    return new KodekooCarbon( TIMEZONE );

};

/*
|--------------------------------------------------------------------------
| IP Address
|--------------------------------------------------------------------------
|
| https://github.com/akrabat/rka-ip-address-middleware
|
*/
$checkProxyHeaders = true; // Note: Never trust the IP address for security processes!
$trustedProxies = ['10.0.0.1', '10.0.0.2']; // Note: Never trust the IP address for security processes!
$app->add( new \RKA\Middleware\IpAddress( $checkProxyHeaders, $trustedProxies) );

/*
|--------------------------------------------------------------------------
| Whoops Debugger
|--------------------------------------------------------------------------
|
| @documentation    https://github.com/filp/whoops
|
*/
if ( ENVIRONMENT == 'development' || ENVIRONMENT == 'debug' ) :

    if ( KODEKOO_DEBUGGER == 'whoops' ):

        $whoops = new \Whoops\Run;
        $whoops->pushHandler( new \Whoops\Handler\PrettyPageHandler );
        $whoops->register();

    endif;

endif;

/*
|--------------------------------------------------------------------------
| KODEKOO FRONTEND ACTION DIC
|--------------------------------------------------------------------------
|
| Fronted Action
|
*/

/*
|--------------------------------------------------------------------------
| KODEKOO BACKEND ACTION DIC
|--------------------------------------------------------------------------
|
| Backend Action
|
*/
$container['Auth'] = function ( $container ) use ( $app ) {

    return new \action\backend\Auth
    (
        $app,
        $container->get( 'logger' ),
        $container->get( 'view' ),
        $container->get( 'timezone' ),
        $container->get( 'csrf' ),
        $container->get( 'sentinel' ),
        $container->get( 'globalhelper' )
    );

};

$container['Dashboard'] = function ( $container ) use ( $app ) {

    return new \action\backend\Dashboard
    (
        $app,
        $container->get( 'logger' ),
        $container->get( 'view' ),
        $container->get( 'timezone' ),
        $container->get( 'csrf' ),
        $container->get( 'sentinel' ),
        $container->get( 'globalhelper' )
    );

};


/*
|--------------------------------------------------------------------------
| Set required files
|--------------------------------------------------------------------------
|
| Descriptions
|
*/
require_once realpath ( "kodekoo/core/__kodekoo__route__.php" );

/*
| ============================================================================================================ |
|   kkk      kkk      ooooo       dddddddd         eeeeeeeeee   kkk      kkk      ooooo            ooooo       |
|   kkk     kkk     ooooooooo     ddddddddddd      eeeeeeeeee   kkk     kkk     ooooooooo        ooooooooo     | 
|   kkk    kkk     ooo     ooo    ddd      ddd     eee          kkk    kkk     ooo     ooo      ooo     ooo    |
|   kkk   kkk     oooo     oooo   ddd       ddd    eee          kkk   kkk     oooo     oooo    oooo     oooo   |
|   kkk  kkk      oooo     oooo   ddd        ddd   eee          kkk  kkk      oooo     oooo    oooo     oooo   |
|   kkkkkkkk      oooo     oooo   ddd        ddd   eeeeeeeeee   kkkkkkkk      oooo     oooo    oooo     oooo   |
|   kkk  kkk      oooo     oooo   ddd        ddd   eee          kkk  kkk      oooo     oooo    oooo     oooo   |
|   kkk   kkk     oooo     oooo   ddd       ddd    eee          kkk   kkk     oooo     oooo    oooo     oooo   |
|   kkk    kkk     ooo     ooo    ddd      ddd     eee          kkk    kkk     ooo     ooo      ooo     ooo    |
|   kkk     kkk     ooooooooo     dddddddddd       eeeeeeeeee   kkk     kkk     ooooooooo        ooooooooo     |
|   kkk      kkk      ooooo       ddddddd          eeeeeeeeee   kkk      kkk      ooooo            ooooo       |
| ============================================================================================================ |
*/

