<?php

/**
 * @link              http://example.com
 * @since             1.0.0
 * @package           document_editor
 *
 * @wordpress-plugin
 * Plugin Name:       document_editor
 * Description:       It lets you create document templates which can be filled by a customer or user
 * Version:           1.0.0
 * Author:            Kama Webservice
 * Author URI:        https://kama-webservice.de/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       document_editor
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'DOCUMENT_EDITOR_VERSION', '1.0.0' );

/**
 * This action is documented in includes/class-document-editor-activator.php
 */
function dce_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-document-editor-activator.php';
	Plugin_Name_Activator::activate();
}

/**
 * This action is documented in includes/class-document-editor-deactivator.php
 */
function dce_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-document-editor-deactivator.php';
	Plugin_Name_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'dce_activate' );
register_deactivation_hook( __FILE__, 'dce_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-document-editor.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function dce_run() {

	$plugin = new Document_editor();
	$plugin->run();

}
dce_run();
