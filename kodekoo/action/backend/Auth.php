<?php namespace action\backend;

/**
 * This file may not be redistributed in whole or significant part.
 * ---------------- THIS IS NOT FREE SOFTWARE ----------------
 *
 *
 * @file       	Auth.php
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

use action\Base;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

// Final class cannot be extended (such as visibility increase, behavior change, etc)

final class Auth extends Base
{

    private $app;
    private $logger;
    private $view;
    private $timezone;
    private $csrf;
    private $sentinel;
    private $globalhelper;

    public function __construct( $app, LoggerInterface $logger, Twig $view, $timezone, $csrf, $sentinel, $globalhelper )
    {

        parent::__construct();

        $this->app          = $app;
        $this->logger       = $logger;
        $this->view         = $view;
        $this->timezone     = $timezone;
        $this->csrf         = $csrf;
        $this->sentinel     = $sentinel;
        $this->globalhelper = $globalhelper;

    }

    public function login( Request $request, Response $response, $args )
    {

        if ( $this->checkAuth ) :

            return $response->withRedirect( $this->app->getContainer()->get( 'router' )->pathFor( 'dashboard.backend' ) );

        endif;

        $this->logger->info( "Login page" );

        $this->view->render($response, 'backend/content/auth/login.twig');

        return $response;
    }

    public function register( Request $request, Response $response, $args )
    {

        if ( $this->checkAuth ) :

            return $response->withRedirect( $this->app->getContainer()->get( 'router' )->pathFor( 'dashboard.backend' ) );

        endif;

        $this->logger->info( "Register page" );

        $this->view->render($response, 'backend/content/auth/register.twig');

        return $response;
    }

}