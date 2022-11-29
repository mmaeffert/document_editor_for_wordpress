<?php

class Document_editor_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $document_editor    The ID of this plugin.
	 */
	private $document_editor;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $document_editor       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $document_editor, $version ) {

		$this->document_editor = $document_editor;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->document_editor, plugin_dir_url( __FILE__ ) . 'css/uikit.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->document_editor, plugin_dir_url( __FILE__ ) . 'css/document-editor.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->document_editor, plugin_dir_url( __FILE__ ) . 'js/document-editor-admin.js', array( 'jquery' ), $this->version, false );

	}



}
