<?php

namespace LinusRichter\FirstPlugin;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action('wp_footer', ['LinusRichter\FirstPlugin\Demo', 'wp_footer'], 11, 0);

class Demo
{
    /**
     * Add a text to the footer
     */
    public static function wp_footer()
    {

        global $start_time;
        $m_size = memory_get_usage();

        echo '
            <p>
                Diese Seite wurde in '. (microtime(true) - $start_time) .' ms gerendert, der maximale Speicherbedarf lag bei '. $m_size .'MB
            </p>
        ';
    }
}

?>