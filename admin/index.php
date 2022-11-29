<?php // Silence is golden

function generate_admin_menu() { 
    add_menu_page( 
        'Document Editor', 
        'Document Editor', 
        'edit_posts', 
        'dce_menu', 
        'admin_menu_content', 
        'dashicons-media-document' 
       );
}

function generate_template_overview_menu(){
    add_submenu_page(
        'dce_menu',
        'Template Overwiew',
        'Template Overview',
        'edit_posts',
        'dce_overview',
        'template_overview_content'
    );
}

function generate_new_template_menu(){
    add_submenu_page(
        'dce_menu',
        'New Template',
        'New Template',
        'edit_posts',
        'dce_new',
        'new_template_content'
    );
}

function new_template_content(){
    include(plugin_dir_path( __FILE__ ).'/new_template.php'); 
}

function template_overview_content(){
    include(plugin_dir_path( __FILE__ ).'/template_overview.php'); 
}

function admin_menu_content(){
    include(plugin_dir_path( __FILE__ ).'/template.php');
}