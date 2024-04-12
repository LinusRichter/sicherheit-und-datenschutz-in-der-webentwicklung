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
        echo '
            <p>
                Diese Seite wurde in 123 ms gerendert, der maximale Speicherbedarf lag bei 123 MB
            </p>
        ';
    }
}

?>