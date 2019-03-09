<?php 
/*
*
* @package ENSplugin
*
*/
/**
  Plugin Name: My custom header bar
  Plugin URI: http://youtube.com
  Description: This plugin customize the header of the page.
  Version: 1.0.0
  Author: ENS
  Author URI: http://ens.enterprises
  License: GPLv2 or later
  Text Domain : ENS plugin
 */
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2019 Automattic, Inc.
*/


defined( 'ABSPATH' ) or die(' Hey , \t you cant access this file directly.');

/**
 * Creating a class 
 */
class HeaderBar
{
	function __construct()
	{
		add_action('init',array( $this,'custom_post_type') );
	}

	function register(){
		add_action( 'admin_enqueue_scripts',array( $this, 'enqueue' ) );
	}
	
	function custom_post_type()
	{
		register_post_type( 'headertop',['public' => true, 'label' => 'HeaderTop'] );
	}

	function enqueue() {
		// Enqueue all you scripts.
		wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyles.css', __FILE__ ) );
		wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
	}

}

if ( class_exists ( 'HeaderBar' ) ) {
	$headerBar = new HeaderBar();
	$headerBar->register();
}

// Require once

//activation
require_once plugin_dir_path( __FILE__ ) . 'inc/ens-activate.php';
register_activation_hook(__FILE__,array( 'EnsActivate', 'activate'));

//deactivation
require_once plugin_dir_path( __FILE__ ) . 'inc/ens-deactivate.php';
register_deactivation_hook(__FILE__,array( 'EnsDeactivate','deactivate'));
