<?php

namespace LinusRichter\FirstPlugin;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//add_filter('get_comment_author_url', [Changer::class, 'change_comment_author_url'], 10, 3);
add_filter('get_comment_author_url', ['LinusRichter\FirstPlugin\Changer', 'change_comment_author_url'], 10, 3);
add_filter('get_comment_author', ['LinusRichter\FirstPlugin\Changer', 'change_comment_author_name'], 10, 3);

class Changer
{
    /**
     * Changes the comment-author link
     */
    public static function change_comment_author_url()
    {
        return 'localhost';
    }

    /**
     * Changes the comment-author-name
     */
    public static function change_comment_author_name()
    {
        return 'Hans';
    }
}

?>