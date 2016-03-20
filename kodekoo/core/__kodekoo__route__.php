<?php

/**
 * This file may not be redistributed in whole or significant part.
 * ---------------- THIS IS NOT FREE SOFTWARE ----------------
 *
 *
 * @file       	__kodekoo__route__.php
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


/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
|
| Descriptions
|
*/
use helpers\KodekooSession;

$app->group( '', function() use ( $app ) {

    $app->get('/', function ( $request, $response, $args ) {

    //    $this->logger->info("Kodekoo Labs <kodekoolabs@gmail.com>");

        $context['name'] = 'World !';

        $context['time'] = $this->timezone;

        return $this->view->render($response, 'frontend/content/homepage.twig', $context);

    })->setName('homepage');

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

    $app->get('/login', function ( $request, $response, $args ) {

        return $this->view->render($response, 'backend/content/login.twig');

    })->setName('login.backend');

    $app->get('', 'Dashboard:index')->setName('dashboard.backend');

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
