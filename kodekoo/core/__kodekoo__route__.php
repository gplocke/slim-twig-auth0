<?php

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


/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
|
| Descriptions
|
*/

$app->group( '', function() use ( $app ) {

    $app->get('/', function ( $request, $response, $args ) {

        $context['name'] = 'World !';

        $context['time'] = $this->timezone;

        return $this->view->render( $response, 'frontend/content/homepage.twig', $context );

    })->setName('homepage');

    $app->get('/callback', function ( $request, $response, $args ) {

    	$router = $this->router;
        
        if ( ! $this->auth0->getUser() ) :

            return $response->withRedirect( $router->pathFor( 'login.backend' ) ); 

        else :

        	return $response->withRedirect( $router->pathFor( 'dashboard.backend' ) ); 

        endif;

    })->setName('auth0-callback');

});

/*
|--------------------------------------------------------------------------
| BACKEND ROUTES
|--------------------------------------------------------------------------
|
| Descriptions
|
*/
$app->group( '/manage', function() use ( $app ) {

    $app->get('/login', 'Auth:login')->setName('login.backend');

    $app->get('/register', 'Auth:register')->setName('register.backend');

    $app->get('', 'Dashboard:index')->setName('dashboard.backend');

    $app->get('/logout', function ( $request, $response, $args ) {

    	$router = $this->router;

    	$this->auth0->logout();
        
        if ( ! $this->auth0->getUser() ) :

            return $response->withRedirect( $router->pathFor( 'login.backend' ) ); 

        else :

        	return $response->withRedirect( $router->pathFor( 'dashboard.backend' ) ); 

        endif;

    })->setName('logout.backend');

});

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
