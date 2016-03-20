<?php

/**
 * This file may not be redistributed in whole or significant part.
 * ---------------- THIS IS NOT FREE SOFTWARE ----------------
 *
 *
 * @file       	__kodekoo__constant__.php
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

require_once realpath ( "kodekoo/database/config/credentials.php" );

/*
 *---------------------------------------------------------------
 * ALL ASSETS AND COMPONENTS DIR
 *---------------------------------------------------------------
 */
define( 'KODEKOO_BASE_DIR', 'http' . ( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ) ? 's' : '') . '://'.$_SERVER['HTTP_HOST'].str_replace( '//','/',dirname( $_SERVER['SCRIPT_NAME'] ).'/') );

define( 'PUBLIC_DIR', KODEKOO_BASE_DIR . 'public/' );

define( 'PUBLIC_ASSETS', KODEKOO_BASE_DIR . 'public/assets/' );

define( 'FRONTEND_ASSETS_CSS', KODEKOO_BASE_DIR . 'public/assets/frontend/css/' );

define( 'FRONTEND_ASSETS_JS', KODEKOO_BASE_DIR . 'public/assets/frontend/js/' );

define( 'FRONTEND_ASSETS_IMG', KODEKOO_BASE_DIR . 'public/assets/frontend/img/' );

define( 'BACKEND_ASSETS_CSS', KODEKOO_BASE_DIR . 'public/assets/backend/css/' );

define( 'BACKEND_ASSETS_JS', KODEKOO_BASE_DIR . 'public/assets/backend/js/' );

define( 'BACKEND_ASSETS_IMG', KODEKOO_BASE_DIR . 'public/assets/backend/img/' );

define( 'GLOBAL_ASSETS_CSS', KODEKOO_BASE_DIR . 'public/assets/global/css/' );

define( 'GLOBAL_ASSETS_JS', KODEKOO_BASE_DIR . 'public/assets/global/js/' );

define( 'GLOBAL_ASSETS_IMG', KODEKOO_BASE_DIR . 'public/assets/global/img/' );

define( 'GLOBAL_COMPONENTS', KODEKOO_BASE_DIR . 'public/components/' );

define( 'JQUERY_COMPONENT', KODEKOO_BASE_DIR . 'public/components/jquery/dist/jquery.min.js' );

define( 'KNOCKOUT_COMPONENT', KODEKOO_BASE_DIR . 'public/components/knockout/dist/knockout.js' );

define( 'FULLCALENDAR_CSS', KODEKOO_BASE_DIR . 'public/components/fullcalendar/dist/fullcalendar.css' );

define( 'FULLCALENDAR_PRINT_CSS', KODEKOO_BASE_DIR . 'public/components/fullcalendar/dist/fullcalendar.print.css' );

define( 'FULLCALENDAR_JS', KODEKOO_BASE_DIR . 'public/components/fullcalendar/dist/fullcalendar.min.js' );

define( 'FULLCALENDAR_MOMENT_JS', KODEKOO_BASE_DIR . 'public/components/moment/min/moment.min.js' );

/*
 *---------------------------------------------------------------
 * DEVELOPMENT DEBUGGER
 *---------------------------------------------------------------
 */
define( 'KODEKOO_DEBUGGER', 'whoops' );

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     debug
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
define( 'ENVIRONMENT', 'development' );

/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but production will hide them.
 */

if ( defined( 'ENVIRONMENT' ) ) :

    switch ( ENVIRONMENT ) :

        case 'development':

            error_reporting( E_ALL & ~E_NOTICE );

            ini_set( 'display_errors', TRUE );

            ini_set('display_startup_errors', TRUE);

            break;

        case 'debug':

            error_reporting( E_ALL | E_STRICT );

            ini_set( 'display_errors', TRUE );

            ini_set('display_startup_errors', TRUE);

            break;

        case 'production':

            error_reporting( 0 );

            ini_set( 'display_errors', FALSE );

            break;

        default:

            exit( 'The environment is not set correctly. ENVIRONMENT = '.ENVIRONMENT.'.' );

    endswitch;

endif;

/*
|--------------------------------------------------------------------------
| TIMEZONE
|--------------------------------------------------------------------------
|
| set timezone for timestamps etc
|
*/
define( 'TIMEZONE', 'Asia/Jakarta' );

date_default_timezone_set( TIMEZONE ); // !

// if ( ini_get('date.timezone') == '' ) :

//     date_default_timezone_set( 'UTC' );

// endif;

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

define('MAX_UPLOAD_SIZE', '1M');

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

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
