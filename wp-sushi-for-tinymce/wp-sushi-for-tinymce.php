<?php
/*
Plugin Name: TinyMCE Sushiyuki Plugin
Plugin URI: https://github.com/burnworks/wp-sushi-for-tinymce
Description: Add sushiyuki icon table for TinyMCE.
Author: Yoshiki kato
Version: 1.0
Author URI: http://hyper-text.org/
*/

class SushiForTinyMCE {
  function SushiForTinyMCE() {
    add_action('plugins_loaded', array(&$this, 'Initalization'));
  }
  function sink_hooks(){
    add_filter('mce_plugins', array(&$this, 'mce_plugins'));
  }
  function Initalization() {
    add_action('init', array(&$this, 'addbuttons'));
  }

  function addbuttons() {
    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
    return;
    if ( get_user_option('rich_editing') == 'true') {
    add_filter("mce_external_plugins", array(&$this, 'mce_external_plugins'));
    add_filter('mce_buttons', array(&$this, 'mce_buttons'));
    }
  }
  function mce_buttons($buttons) {
    array_push($buttons, "separator", "sushi");
    return $buttons;
  }
  function mce_external_plugins($plugin_array) {
    global $sushi_plugin_url;
    $plugin_array['SushiForTinyMCE'] = $sushi_plugin_url.'editor_plugin.js';
    return $plugin_array;
  }
}

$sushi_plugin_url = plugin_dir_url( __FILE__ );
$mybutton = new SushiForTinyMCE();
add_action('init',array(&$mybutton, 'SushiForTinyMCE'));

?>
