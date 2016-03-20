<?php namespace database\entity;

use database\Base;

class UserEntity extends Base
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = self::DB_USERS;

    protected $guarded = array( 'id' );

    public $incrementing  = false;

    public $timestamps = false;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'id', 'password', 'permissions', 'last_login' ];

}