<?php

namespace THM\Security;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_filter('wp_loaded',['THM\Security\Classifier', 'init'], 5);

/**
 * Database module for the THM Security plugin.
 */
class Classifier
{
    public static function init()
    {
        $request_class = 'normal';

        if (preg_match('/\/wp-config.php/i', $_SERVER['REQUEST_URI']))
        {
            $request_class = 'config-grabber';
        }

        header("X-THMSEC: ENABLED");
        header("X-THMSEC-CLASS: $request_class");

        if ($request_class != 'normal')
        {
            header("HTTP/1.1 404 Not Found");
            exit;
        }
    }
}