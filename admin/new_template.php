<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// wp_register_style( 'wptest', 'css/uikit.min.css' );
// wp_enqueue_style( 'wptest' );


?>
<h1 class="uk-heading">New template</h1>
<div style="background-color:white; width: fit-content;" class="uk-card uk-card-body">
<form id="upload_template_form" action="" enctype="multipart/form-data" method="post">

    <p style="margin-bottom:5px">Chose a descriptive Name</p>
    <div style="width:30%">
        <input placeholder="Template Name" class="uk-input-small" type="text" name="name" id="name">
    </div>
    <p style="margin-bottom:5px">Name of the company that can access this template (has to match the username of that company)</p>
    <div style="width:30%">
        <input placeholder="Company Name" class="uk-input-small" type="text" name="company_name" id="name">
    </div>

    <p style="margin-bottom:5px">High resolution background image without customizable content</p>
    <input name="upload_template" id="upload_template" type="file" accept="image/jpg, image/png" aria-label="Custom controls">
    <p style="margin-bottom:5px">High resolution background image with customizable content, to make the marking of the fields easier</p>
    <input name="upload_pattern" id="upload_pattern" type="file" accept="image/jpg, image/png" aria-label="Custom controls">
    <p>
        <input class="uk-button uk-button-default" id="btnSubmit" type="submit" value="Upload" />
    </p>

</form>
</div>
<?php

$error = "";
if (isset($_FILES['upload_template']) && isset($_POST['company_name']) && isset($_POST['name'])) {
  if($_FILES['upload_template']['name']) {
    if(!$_FILES['upload_template']['error']) {
			$uploadFileName = sanitize_text_field($_FILES["upload_template"]["name"]);
			$imageFileType = strtolower(pathinfo($uploadFileName, PATHINFO_EXTENSION));

      // Check if image file is a actual image or fake image
      if (getimagesize($_FILES["upload_template"]["tmp_name"]) == false) {
        	$error = "File is not an image.";
      }
      //can't be larger than 30 MB
      if($_FILES['upload_template']['size'] > (30000000)) {
        $error =  'Your file size is to large.';
      }

			// Allow certain file formats
			 if ($imageFileType != "jpg" && $imageFileType != "png") {
					 $error =  "Sorry, only JPG / PNG files are allowed.";
			 }
		}else {
      //set that to be the returned message
      echo('Error: '.sanitize_text_field( $_FILES['upload_template']['error']));
    }
	}

	if($_FILES['upload_pattern']['name']) {
    if(!$_FILES['upload_pattern']['error']) {
			$uploadFileName = sanitize_text_field($_FILES["upload_pattern"]["name"]);
			$imageFileType = strtolower(pathinfo($uploadFileName, PATHINFO_EXTENSION));

      // Check if image file is a actual image or fake image
      if (getimagesize($_FILES["upload_pattern"]["tmp_name"]) == false) {
        	$error = "File is not an image.";
      }
      //can't be larger than 30 MB
      if($_FILES['upload_pattern']['size'] > (30000000)) {
        $error =  'Your file size is to large.';
      }

			// Allow certain file formats
			 if ($imageFileType != "jpg" && $imageFileType != "png") {
					 $error =  "Sorry, only JPG / PNG files are allowed.";
			 }
		}else {
      //set that to be the returned message
      echo('Error: '.sanitize_text_field( $_FILES['upload_pattern']['error']));
    }
	}
	if(empty($error)){
    //the file has passed the test
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );

    // Let WordPress handle the upload_pattern.
    $file_id_template = media_handle_upload('upload_template', 0 );
		$file_id_pattern = media_handle_upload('upload_pattern', 0 );

    if ( is_wp_error( $file_id_template ) || is_wp_error( $file_id_pattern ) ) {
       wp_die('Error loading file!');
    } else {
      global $wpdb;
      $table_name = $wpdb ->base_prefix .'vkc_templates';
      $wpdb->insert($table_name, array(
      'name' => esc_sql($_POST['name']),
      'image_id' => esc_sql( $file_id_pattern ),
			'image_id_template' => esc_sql( $file_id_template ),
      'company_name' => esc_sql($_POST['company_name']),
      ));

      echo 'Your menu was successfully imported.';
    }
  }
	else {
		echo "Error: ".$error;
	}
}