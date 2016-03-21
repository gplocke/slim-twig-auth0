<?php namespace action\backend;

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

use action\Base;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

// Final class cannot be extended (such as visibility increase, behavior change, etc)

final class Auth extends Base
{

    private $app;
    private $auth0;
    private $logger;
    private $view;
    private $timezone;
    private $csrf;
    private $globalhelper;

    public function __construct( $app, $auth0, LoggerInterface $logger, Twig $view, $timezone, $csrf, $globalhelper )
    {

        parent::__construct();

        $this->app          = $app;
        $this->auth0        = $auth0;
        $this->logger       = $logger;
        $this->view         = $view;
        $this->timezone     = $timezone;
        $this->csrf         = $csrf;
        $this->globalhelper = $globalhelper;

    }

    public function login( Request $request, Response $response, $args )
    {

        if ( $this->auth0->getUser() ) :

            return $response->withRedirect( $this->app->getContainer()->get( 'router' )->pathFor( 'dashboard.backend' ) );

        endif;

        $this->logger->info( "Login page" );

        $this->context = [

            'KODEKOO_AUTH0_DOMAIN'          => KODEKOO_AUTH0_DOMAIN,
            'KODEKOO_AUTH0_CLIENT_ID'       => KODEKOO_AUTH0_CLIENT_ID,
            'KODEKOO_AUTH0_CLIENT_SECRET'   => KODEKOO_AUTH0_CLIENT_SECRET,
            'KODEKOO_AUTH0_REDIRECT_URI'    => KODEKOO_AUTH0_REDIRECT_URI,

            'SEMANTIC_COMPONENT' => SEMANTIC_COMPONENT,
            'GLOBAL_COMPONENTS'  => GLOBAL_COMPONENTS,
            'GLOBAL_ASSETS_CSS'  => GLOBAL_ASSETS_CSS

        ];

        $this->view->render ( $response, $this->kodekoo[ 'backend.theme.path' ] . 'auth/login.twig', $this->context );

        return $response;
    }

    public function register( Request $request, Response $response, $args )
    {

        if ( $this->checkAuth ) :

            return $response->withRedirect( $this->app->getContainer()->get( 'router' )->pathFor( 'dashboard.backend' ) );

        endif;

        $this->logger->info ( "Register page" );

        $this->view->render ( $response, $this->kodekoo[ 'backend.theme.path' ] . 'auth/register.twig' );

        return $response;
    }

    public function forgot ( Request $request, Response $response, $args )
    {

        // TODO[rizkiwisnuaji] Implement this

    }

    public function reset( Request $request, Response $response, $args )
    {

        // TODO[rizkiwisnuaji] Implement this

    }

}