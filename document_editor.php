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
function document_editor_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-document-editor-activator.php';
	document_editor_Activator::activate();
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-document-editor.php';


add_action('admin_menu', 'call_admin_menu_generator');

function call_admin_menu_generator(){
	include plugin_dir_path( __FILE__ ) . 'admin/index.php';
	generate_admin_menu();
	generate_template_overview_menu();
	generate_new_template_menu();
}


/**
 * This action is documented in includes/class-document-editor-deactivator.php
 */
function document_editor_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-document-editor-deactivator.php';
	document_editor_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'document_editor_activate' );
register_deactivation_hook( __FILE__, 'document_editor_deactivate' );



/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function document_editor_run() {

	$plugin = new Document_editor();
	$plugin->run();

}
document_editor_run();


