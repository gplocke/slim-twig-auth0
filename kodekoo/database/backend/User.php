<?php namespace database\backend;

use database\entity\UserEntity;

class User
{

    public static function registerUser()
    {

    }

    public static function countUser()
    {

        $query = UserEntity::all();

        return count ( $query );
    }

}

