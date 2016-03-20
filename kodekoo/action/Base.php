<?php namespace action;

/**
 * This file may not be redistributed in whole or significant part.
 * ---------------- THIS IS NOT FREE SOFTWARE ----------------
 *
 *
 * @file       	Base.php
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

use helpers\KodekooSession;

abstract class Base // Abstract class cannot be instantiated
{

    public function __construct()
    {

        $this->checkAuth = KodekooSession::userIsLoggedIn();

        $this->kodekoo = [];

        $this->context = [];

    }

}