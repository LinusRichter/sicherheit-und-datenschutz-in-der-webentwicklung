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
        header("X-THMSEC-CLASS: " . self::$request_class);

        if (self::$request_class != 'normal')
        {
            $count = Database::get_unwanted_requests_count($_SERVER['REMOTE_ADDR'], 1);
            header("X-THMSEC-COUNT: $count");
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
        if (preg_match('/.sql/i', $uri) || preg_match('/.sqlite3/i', $uri)) {
            return 'database-access';
        }
        if (preg_match('/\?author/i', $uri)) {
            return 'author-access';
        }        

        if (preg_match('/searchreplacedb2.php/i', $uri)) {
            return 'suspicious-file-access';
        }  
        if (preg_match('/installer-log.txt/i', $uri)) {
            return 'suspicious-file-access';
        }  
        if (preg_match('/emergency.php/i', $uri)) {
            return 'suspicious-file-access';
        }  
        if (preg_match('/feed/i', $uri)) {
            return 'suspicious-file-access';
        }  
        if (preg_match('/comments\/feed/i', $uri)) {
            return 'suspicious-file-access';
        }  
        if (preg_match('/7f5dcd0.html/i', $uri)) {
            return 'suspicious-file-access';
        }  
        if (preg_match('/backup/i', $uri)) {
            return 'suspicious-file-access';
        }  
        if (preg_match('/fantastico_fileslist.txt/i', $uri)) {
            return 'suspicious-file-access';
        }  
        if (preg_match('/\?attachment_id/i', $uri)) {
            return 'suspicious-file-access';
        }  
        if (preg_match('/wp-json\/oembed/i', $uri)) {
            return 'suspicious-file-access';
        }  
        if (preg_match('/wp-sitemap-users-1.xml/i', $uri)) {
            return 'suspicious-file-access';
        }  
        if (preg_match('/author-sitemap.xml/i', $uri)) {
            return 'suspicious-file-access';
        }

        return 'normal';
    }

    public static function get_request_class()
    {
        return self::$request_class;
    }
}