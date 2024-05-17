<?php

namespace LinusNiko\Own;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once(dirname(__FILE__) . '/database.php');

add_action('admin_menu', ['\LinusNiko\Own\Log', 'add_menu']);
add_action('shutdown', ['\LinusNiko\Own\Log', 'log_access']);

/**
 * Log module for the THM Security plugin.
 */
class Log
{
    /**
     * Adds a menu item to the tools menu.
     */
    public static function add_menu()
    {
        add_management_page('THM Security', 'THM Security', 'manage_options', 'thm-security', ['\LinusNiko\Own\Log', 'render_management_page']);
    }

    /**
     * Renders the management page.
     */
    public static function render_management_page()
    {
        if (!current_user_can('manage_options')) return;

        $tab = sanitize_text_field(@$_GET['tab'] ?: '');

        ?>
        <div class="wrap">
            <h1><?= esc_html(get_admin_page_title()) ?></h1>
            <nav class="nav-tab-wrapper">
                <a href="?page=thm-security" class="nav-tab <?= empty($tab) ? 'nav-tab-active' : '' ?>">Access Log</a>
                <a href="?page=thm-security&tab=page2" class="nav-tab <?= ($tab == 'page2') ? 'nav-tab-active' : '' ?>">Leere Seite</a>
            </nav>
            <?php if(empty($tab))    self::render_access_log(); ?>
            <?php if($tab==='page2') self::render_empty_page(); ?>
        </div>
        <?php
    }

    /**
     * Renders the access log tab on the management page.
     */
    private static function render_access_log()
    {
        $logs = Database::get_access_log();

        ?>
        <table class="wp-list-table widefat fixed striped table-view-list">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>IP</th>
                    <th>PORT</th>
                    <th>METHOD</th>
                    <th>PROTOCOL</th>
                    <th>URL</th>
                    <th>ACCEPT</th>
                    <th>ACCEPT LANGUAGE</th>
                    <th>REFERER</th>
                    <th>AGENT</th>
                    <th>UA</th>
                    <th>UA MOBILE</th>
                    <th>UA PLATFORM</th>
                    <th>FETCH MODE</th>
                    <th>FETCH SITE</th>
                    <th>FETCH USER</th>
                    <th>USER ID</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($logs as $log): ?>
                    <tr>
                        <td><?= esc_html($log->time) ?></td>
                        <td><?= esc_html($log->client) ?></td>
                        <td><?= esc_html($log->port) ?></td>
                        <td><?= esc_html($log->method) ?></td>
                        <td><?= esc_html($log->protocol) ?></td>
                        <td><?= esc_html($log->url) ?></td>
                        <td><?= esc_html($log->accept) ?></td>
                        <td><?= esc_html($log->accept_language) ?></td>
                        <td><?= esc_html($log->referer) ?></td>
                        <td><?= esc_html($log->agent) ?></td>
                        <td><?= esc_html($log->ua) ?></td>
                        <td><?= esc_html($log->ua_mobile) ?></td>
                        <td><?= esc_html($log->ua_platform) ?></td>
                        <td><?= esc_html($log->fetch_mode) ?></td>
                        <td><?= esc_html($log->fetch_site) ?></td>
                        <td><?= esc_html($log->fetch_user) ?></td>
                        <td><?= esc_html($log->user_id) ?></td>
                        <td><?= esc_html($log->status) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
    }

    /**
     * Renders the empty page tab on the management page.
     */
    private static function render_empty_page()
    {
        ?>
        <p>
            Dies ist eine leere Seite.<br>
            Sie können beliebig viele weitere Seiten hinzufügen.
        </p>
        <?php
    }

    /**
     * Logs any access to the website into the database.
     */
    public static function log_access()
    {   
        Database::append_access_log(
            $_SERVER['REMOTE_ADDR'] ?? '~',
            $_SERVER['REMOTE_PORT'] ?? '~',
            $_SERVER['REQUEST_METHOD'] ?? '~',
            $_SERVER['SERVER_PROTOCOL'] ?? '~',
            $_SERVER['REQUEST_URI'] ?? '~',
            $_SERVER['HTTP_ACCEPT'] ?? '~',
            $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '~',
            $_SERVER['HTTP_REFERER'] ?? '~',
            $_SERVER['HTTP_USER_AGENT'] ?? '~',
            $_SERVER['HTTP_SEC_CH_UA'] ?? '~',
            $_SERVER['HTTP_SEC_CH_UA_MOBILE'] ?? '~',
            $_SERVER['HTTP_SEC_CH_UA_PLATFORM '] ?? '~',
            $_SERVER['HTTP_SEC_FETCH_MODE'] ?? '~',
            $_SERVER['HTTP_SEC_FETCH_SITE'] ?? '~',
            $_SERVER['HTTP_SEC_FETCH_USER'] ?? '~',
            get_current_user_id(),
            http_response_code()
        );
    }
}
?>