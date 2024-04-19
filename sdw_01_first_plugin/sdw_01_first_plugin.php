<?php
/*
Plugin Name: SDW-01-First-Plugin
Description: Mein erstes Plugin in WP.
Version: 1.0.0
Author: Linus Richter
*/

namespace LinusRichter\FirstPlugin;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once(dirname(__FILE__) . '/modules/demo.php');
require_once(dirname(__FILE__) . '/modules/comment-author.php');

?>