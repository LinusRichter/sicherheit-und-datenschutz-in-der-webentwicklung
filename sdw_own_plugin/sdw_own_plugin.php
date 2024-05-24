<?php
/*
Plugin Name: Own Plugin
Description: our own plugin
Version: 1.0.0
Author: Linus und Niko 
*/

namespace LinusNiko\Own;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once(dirname(__FILE__) . '/modules/log.php'); //requires database.php
require_once(dirname(__FILE__) . '/modules/username_protection.php');
require_once(dirname(__FILE__) . '/modules/classifier.php');

?>