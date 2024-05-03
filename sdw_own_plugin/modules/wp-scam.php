<?php

namespace LinusNiko\Own;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_filter( 'rest_prepare_user', ['\LinusNiko\Own\Fake', 'fake_users'], 100, 3);

class Fake
{
    public static function fake_users( $response, $user, $request ) {
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
}