<?php

namespace LinusNiko\Own;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_filter('wp_loaded',['LinusNiko\Own\Classifier', 'classify_init'], 1);

/**
 * Database module for the THM Security plugin.
 */
class Classifier
{

    private static $request_class;

    public static function classify_init()
    {
        self::$request_class = self::classify_request();

        header("X-THMSEC: ENABLED");
        header("X-THMSEC-CLASS: $request_class");

        if (self::$request_class != 'normal')
        {
            header("HTTP/1.1 404 Not Found");
            exit;
        }
    }

    public static function classify_request()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $agent = $_SERVER['HTTP_USER_AGENT'];

        if (preg_match('/wp-config/i', $uri)) {
            return 'config-grabber';
        }
        if (preg_match('/\/xmlrpc.php/i', $uri)) {
            return 'xmlrpc-access';
        }
        if (preg_match('/\/wp-admin/i', $uri) && !is_user_logged_in()) {
            return 'admin-access';
        }
        if (preg_match('/\/wp-content\/themes/i', $uri)) {
            return 'theme-access';
        }
        if (preg_match('/\/wp-content\/plugins/i', $uri)) {
            return 'plugins-access';
        }
        if (preg_match('/\/wp-content/i', $uri)) {
            return 'wp-content access';
        }
        if (preg_match('/.sql/', $uri) || preg_match('/.sqlite3/', $uri)) {
            return 'database-access';
        }


        /*if (preg_match('/WPScan/i', $agent) && !is_user_logged_in()) {
            return 'WP-SCAN';
        }*/

        return 'normal';
    }

    public static function get_request_class()
    {
        return self::$request_class;
    }
}