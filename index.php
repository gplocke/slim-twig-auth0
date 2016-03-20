<?php

/**
 * This file may not be redistributed in whole or significant part.
 * ---------------- THIS IS NOT FREE SOFTWARE ----------------
 *
 *
 * @file       	index.php
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

if ( PHP_SAPI == 'cli-server' ) :

    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $file = __DIR__ . $_SERVER['REQUEST_URI'];

    if ( is_file ( $file ) ) :

        return false;

    endif;

endif;

if ( file_exists ( 'vendor/autoload.php' ) ) :

    require_once realpath ( "vendor/autoload.php" );

else :

    $output = json_encode(
        [ //create JSON data
            'author'=>'Kodekoo',
            'email'=>'kodekoolabs@gmail.com',
            'website'=>'www.kodekoo.com',
            'messages' => 'Please install via composer.json => `composer install`'
        ]);

    die( $output ); //exit script outputting json

endif;

require_once realpath ( "kodekoo/core/__kodekoo__init__.php" );

/*
|--------------------------------------------------------------------------
| Finally, run the app !
|--------------------------------------------------------------------------
|
| Descriptions
|
*/
$app->run();

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
