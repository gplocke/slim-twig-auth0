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

final class Dashboard extends Base
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

    public function index( Request $request, Response $response, $args )
    {

        if ( ! $this->auth0->getUser() ) :

            return $response->withRedirect( $this->app->getContainer()->get( 'router' )->pathFor( 'login.backend' ) );
            // return $response->withStatus(400)->write('Bad Request');

        endif;

        $this->logger->info( "Dashboard page" );

        $this->context = [

            'user'          =>  $this->auth0->getUser(),

            'time'          => TIMEZONE . ' : ' . $this->timezone,

            'ip'            => $request->getAttribute( 'ip_address' ),

            'csrf_name'     => $request->getAttribute( $this->csrf->getTokenNameKey() ),

            'csrf_value'    => $request->getAttribute( $this->csrf->getTokenValueKey() ),

            'logout_link'   => $this->app->getContainer()->get( 'router' )->pathFor( 'logout.backend' ),

        ];


        $this->view->render ( $response, $this->kodekoo[ 'backend.theme.path' ] . 'dashboard.twig', $this->context );

        return $response;
    }

}