<?php namespace database;

/**
 * This file may not be redistributed in whole or significant part.
 * ---------------- THIS IS NOT FREE SOFTWARE ----------------
 *
 *
 * @file        Base.php
 * @package     Bootstrap Web Application Products
 * @company     Kodekoo <kodekoolabs@gmail.com>
 * @programmer  Rizki Wisnuaji, drg., M.Kom. <rizkiwisnuaji@comestoarra.com>
 * @copyright   2016 Kodekoo. All Rights Reserved.
 * @license     http://kodekoo.com/license
 * @version     Release: @1.0@
 * @framework   http://slimframework.com
 *
 *
 * ---------------- THIS IS NOT FREE SOFTWARE ----------------
 * This file may not be redistributed in whole or significant part.
 **/

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Eloquent\Model as KodekooEloquent;
use Illuminate\Database\Capsule\Manager as KodekooCapsule;

abstract class Base extends KodekooEloquent
{

    const DB_USERS      = "users";

    public function __construct()
    {
        parent::__construct();

        $kodekooCapsule = new KodekooCapsule;
        $kodekooCapsule->addConnection(
            [
                'driver'    => DB_TYPE,
                'host'      => DB_HOST,
                'database'  => DB_NAME,
                'port'      => DB_PORT,
                'username'  => DB_USER,
                'password'  => DB_PASS,
                'charset'   => DB_CHARSET,
                'collation' => DB_COLLATION,
                'prefix'    => DB_PREFIX,
            ]
        );
        $kodekooCapsule->setAsGlobal();
        $kodekooCapsule->bootEloquent();

    }

}

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