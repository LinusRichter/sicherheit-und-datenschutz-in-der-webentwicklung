<?php

namespace LinusRichter\FirstPlugin;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_filter('get_comment_author_url', ['LinusRichter\FirstPlugin\Changer', 'change_comment_author_url'], 10, 1);
add_filter('get_comment_author', ['LinusRichter\FirstPlugin\Changer', 'change_comment_author_name'], 10, 1);

class Changer
{
    /**
     * Changes the comment-author-link
     */
    public static function change_comment_author_url($url)
    {
        return $url = 'localhost';
    }

    /**
     * Changes the comment-author-name
     */
    public static function change_comment_author_name($comment_author)
    {
        return $comment_author = 'Hans';
    }
}

?>