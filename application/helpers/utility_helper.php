<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Provide Assets Folder Url
 */
if ( !function_exists('asset_url()') )
{
    function asset_url()
    {
        return base_url() . 'assets/';
    }
}

/**
 *  Returns 'active' when link is active.
 */
if ( !function_exists('active_link') )
{
    function active_link( $controller )
    {
        $CI =& get_instance();
        $class = $CI->router->fetch_class();
        return ($class == $controller) ? 'active' : '';
    }
}
