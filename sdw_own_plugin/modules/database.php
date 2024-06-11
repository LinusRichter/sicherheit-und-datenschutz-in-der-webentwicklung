<?php

namespace LinusNiko\Own;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

add_action('plugins_loaded',['LinusNiko\Own\Database', 'init'], 5);

/**
 * Database module for the THM Security plugin.
 */
class Database
{
    private static $db_version = '3';
    private static $table_name = 'thm_security_access_log';

    /**
     * Initialize the database module.
     */
    public static function init()
	{
		if (get_site_option(self::$table_name . '_db_version') != self::$db_version)
		{
			self::install_db();
		}
	}

    /**
     * Install the database on the mysql server.
     */
    private static function install_db()
	{
		global $wpdb;
        $db = $wpdb->prefix . self::$table_name;
		
		$charset_collate = $wpdb->get_charset_collate();
		
		$table = "CREATE TABLE $db (
			time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
            client VARCHAR(32),
            method VARCHAR(32),
            url VARCHAR(128),
            agent VARCHAR(256),
            status VARCHAR(32),
            classification VARCHAR(32)
		) $charset_collate;";
        dbDelta($table);

		update_site_option(self::$table_name . '_db_version', self::$db_version);
	}

    /**
     * Get a list of all entries from the access log.
     */
    public static function get_access_log()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . self::$table_name;
        $logs = $wpdb->get_results("SELECT * FROM $table_name");
        return $logs;
    }

    /**
     * Add a new entry to the access log.
     */
    public static function append_access_log($client, $method, $url, $agent, $status, $classification)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . self::$table_name;
        $result_check = $wpdb->insert($table_name, [
            'client' => $client, 
            'url' => $url, 
            'method' => $method,
            'agent' => $agent,
            'status' => $status,
            'classification' => $classification
        ]);
    }

    public static function get_unwanted_requests_count($ip, $timeframe_hours)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . self::$table_name;
        $timeframe = date('Y-m-d H:i:s', strtotime("-$timeframe_hours hours"));
        $count = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM $table_name WHERE client = '%s' AND classification != 'normal' AND time > '%s'", 
            $ip, $timeframe
        ));
        return $count;
    } 
}