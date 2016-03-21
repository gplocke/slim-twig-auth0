<?php namespace helpers;

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

use SplStack;

if ( ! defined( 'PASSWORD_BCRYPT' ) ) :

    define( 'PASSWORD_BCRYPT', 1 );
    define( 'PASSWORD_DEFAULT', PASSWORD_BCRYPT );

endif;

class GlobalHelper
{

    public static function XSSFilter( &$value )
    {

        if ( is_string( $value ) ) :

            $value = htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' );

        endif;

        return $value;

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