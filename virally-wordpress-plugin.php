<?php
/*
Plugin Name: Virally Integration
Plugin URI: https://github.com/VirallyApp/virally-wordpress-plugin
Description: Wordpress plugin to insert virally embed buttons into posts. This plugin is a work in progress, whilst it is considered production ready it is feature limited at the moment.
Version: 0.1
Author: Virally Ltd
Author URI: http://virallyapp.com
License: GPL2
*/

require 'VirallyShortCodes.php';

add_shortcode('virally_buttons', 'virally_buttons_short_code');
function virally_buttons_short_code($attrs) {
  return VirallyShortCodes::instance()->virally_buttons_short_code($attrs);
}