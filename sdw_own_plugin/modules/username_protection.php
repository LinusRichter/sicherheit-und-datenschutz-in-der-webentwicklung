<?php

namespace LinusNiko\Own;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//Filter
add_filter('rest_prepare_user', ['\LinusNiko\Own\UsernameProtection', 'fake_users'], 100, 3);
add_filter('get_comment_author_url', ['\LinusNiko\Own\UsernameProtection', 'change_comment_author_url'], 10, 1);
add_filter('get_comment_author', ['\LinusNiko\Own\UsernameProtection', 'change_comment_author_name'], 10, 1);
add_filter('the_author', ['\LinusNiko\Own\UsernameProtection', 'change_author_display_name'], 10, 1);

//Actions

class UsernameProtection
{
    public static function fake_users( $response, $user, $request ) 
    {
      $words = array("Cool", "Awesome", "Ninja", "Master", "Epic", "Super", "Ultra", "Mega", "Fantastic", "Incredible");

      $nickname = "";
      $numWords = rand(2, 4);
      for ($i = 0; $i < $numWords; $i++) {
          $randomWord = $words[array_rand($words)];
          $nickname .= $randomWord;
          if ($i < $numWords - 1) {
              $nickname .= " ";
          }
      }

      $response->data['name'] = $nickname;
      $response->data['slug'] = strtolower($nickname);

      return $response;
    }

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
        return $comment_author = 'Anonymous Author';
    }

    public static function change_author_display_name($display_name) {
        return $display_name = "Anonymous Author";
    }

    
}