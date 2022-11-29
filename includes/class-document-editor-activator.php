<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    document_editor
 * @subpackage document_editor/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    document_editor
 * @subpackage document_editor/includes
 * @author     Your Name <email@example.com>
 */
class Document_editor_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

	}
}

	function generate_admin_menu() { 
		echo"hey";
		add_menu_page( 
			'Document Editor', 
			'Document Editor', 
			'edit_posts', 
			'menu_slug', 
			'admin_menu_content', 
			'dashicons-media-document' 
		   );
	}
	
	function admin_menu_content(){
		include(plugin_dir_path( __FILE__ ).'../admin/template.php');
	}
