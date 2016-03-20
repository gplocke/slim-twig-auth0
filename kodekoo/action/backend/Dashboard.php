<?php namespace action\backend;

/**
 * This file may not be redistributed in whole or significant part.
 * ---------------- THIS IS NOT FREE SOFTWARE ----------------
 *
 *
 * @file       	Dashboard.php
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
use database\backend\User;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

// it cannot be extended (such as visibility increase, behavior change, etc)

final class Dashboard extends Base
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

    public function index( Request $request, Response $response, $args )
    {

        if ( ! $this->checkAuth ) :

            return $response->withRedirect( $this->app->getContainer()->get( 'router' )->pathFor( 'login.backend' ) );
            // return $response->withStatus(400)->write('Bad Request');

        endif;

        $this->logger->info( "Dashboard page" );

        $this->context = [

            'user'          =>  User::countUser(),

            'name'          => 'Backend !',

            'random'        => $this->globalhelper->generatePassword(),

            'time'          => TIMEZONE . ' : ' . $this->timezone,

            'ip'            => $request->getAttribute( 'ip_address' ),

            'csrf_name'     => $request->getAttribute( $this->csrf->getTokenNameKey() ),

            'csrf_value'    => $request->getAttribute( $this->csrf->getTokenValueKey() ),

        ];


//        $check = $this->sentinel->findByCredentials([
//            'login'    => 'john.doe@example.com'
//        ]);
//
//        if ( $check ) :
//
//            $this->context['message'] = 'User already exists !';
//
//        else :
//
//            $this->sentinel->register([
//                'email'    => 'john.doe@example.com',
//                'password' => 'password',
//            ]);
//
//            $this->context['message'] = 'User was created !';
//
//        endif;


        $this->view->render( $response, 'backend/content/dashboard.twig', $this->context );

        return $response;
    }

}