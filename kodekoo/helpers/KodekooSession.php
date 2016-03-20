<?php namespace helpers;

class KodekooSession
{

    public static function init()
    {
        if ( session_status() == PHP_SESSION_NONE || session_id() == '' ) :

            ini_set( 'session.use_only_cookies', true );
            session_cache_limiter( false );
            session_start();

            if ( ! isset( $_SESSION['kdk_generated'] ) || $_SESSION['kdk_generated'] < ( time() - 30 ) ) :

                static::regenerate();
                $_SESSION['kdk_generated'] = time();

            endif;

        endif;
    }

    public static function regenerate()
    {
        if ( session_id() == '' ) :

            session_regenerate_id( true );
            return session_id();

        endif;
    }

    public static function set( $key, $value )
    {
        $_SESSION[$key] = $value;
    }

    public static function get( $key )
    {
        if ( isset ( $_SESSION[ $key ] ) ) :

            if ( is_string( $_SESSION[ $key ] ) ) :

                // filter the value for XSS vulnerabilities
                GlobalHelper::XSSFilter( $_SESSION[ $key ] );

                return $_SESSION[ $key ];

            else :

                return $_SESSION[ $key ];

            endif;

        endif;

        return false;

    }

    public static function add( $key, $value )
    {
        $_SESSION[ $key ][] = $value;
    }

    /**
     * deletes the session (= logs the user out)
     */
    public static function destroy()
    {
        session_unset();
        session_destroy();
    }

    public static function userIsLoggedIn()
    {
        return ( self::get( 'user_logged_in' ) ? true : false );
    }

}
