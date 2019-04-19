<?php
require_once(TEMPLATEPATH . '/includes/sidebars.php');
require_once(TEMPLATEPATH . '/includes/customize.php');
require_once(TEMPLATEPATH . '/includes/custom-posts.php');
require_once(TEMPLATEPATH . '/includes/taxonomy.php');

//Add support for WordPress 3.0's custom menus
add_action( 'init', 'register_my_menu' );

 
 
//Register area for custom menu
function register_my_menu() {
    register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
    register_nav_menu( 'footer-menu', __( 'Footer Menu' ) );
}

//Enable multisite feature (WordPress 3.0)
define('WP_ALLOW_MULTISITE', true);

//Add thumbnails
add_action( 'after_setup_theme', 'ja_theme_setup' );
function ja_theme_setup() {
add_theme_support( 'post-thumbnails');
}
show_admin_bar( false );

//convert rating gif to png

function custom_rating_image_extension() {
    return 'png';
}
add_filter( 'wp_postratings_image_extension', 'custom_rating_image_extension' );


//upload APK files to custom folder

add_filter( 'acf/upload_prefilter/name=apk_file_upload', 'secure_upload_prefilter' );
add_filter( 'acf/prepare_field/name=apk_file_upload', 'secure_files_field_display' );

function secure_upload_prefilter( $errors ) {

  add_filter( 'upload_dir', 'secure_upload_directory' );

  return $errors;

}

function secure_upload_directory( $param ) {
        
  $folder = '/game-files';

  $param['path'] = $param['basedir'] . $folder;
  $param['url'] = $param['baseurl'] . $folder;
  $param['subdir'] = '/';

  return $param;

}

function secure_files_field_display( $field ) {

  // update paths accordingly before displaying link to file
  add_filter( 'upload_dir', 'secure_upload_directory' );

  return $field;

}

 // Add filter to allow APK file upload

  add_filter('upload_mimes', 'acp_custom_mimes');

 function acp_custom_mimes ( $existing_mimes=array() ) {
		// ' with mime type '<code>application/vnd.android.package-archive</code>'
		$existing_mimes['apk'] = '<code>application/vnd.android.package-archive</code>';
		return $existing_mimes;
		}


//cron job to decrement the trail period counter daily by 1

/*function my_cron_schedules($schedules){
    if(!isset($schedules["5min"])){
        $schedules["5min"] = array(
            'interval' => 3*60,
            'display' => __('Once every 5 minutes'));
    }
     
    return $schedules;
}
add_filter('cron_schedules','my_cron_schedules');*/

/*if (!wp_next_scheduled('my_task_hook')) {
	wp_schedule_event( time(), 'daily', 'my_task_hook' );
}
add_action ( 'my_task_hook', 'my_task_function' );*/

/*function my_task_function() {
	     global $wpdb;
	     $users = get_users(array(
	    'meta_key'     => 'trial_period',
	    'meta_value'   => '0',
	    'meta_compare' => '>',
	    ));
		    foreach ( $users as $user ) {

			    	$u_id = $user->ID;
			    	$u_mobile = $user->user_login;
			    	$period_value = get_user_meta($u_id, 'trial_period', 'true');
			    	$period_value = $period_value -1;
			    	//$period_value = '25';
			    	update_user_meta( $u_id, 'trial_period', $period_value);
			    	if($period_value == 0){
                    $val = $wpdb->get_row("SELECT id FROM otp_req WHERE cellno = '".$u_mobile."'", ARRAY_A);

                    $otp_req_id = $val[id];


			    		$status ='110';

			    		$wpdb->update( 
							'otp_req', 
							array( 
								'status' => $status								
							), 
							array( 'id' => $otp_req_id ), 
							array( 
								'%d'	// value1
								
							) 
				        );


			    	}
		     
	       }
 
//reset download counter to 10 daily for each user

$daily_Quota_users = get_users(array(
    'meta_key'     => 'download_quota',
));

$daily_Quota_users = get_users(array(
    'meta_key'     => 'download_quota',
));

foreach ( $daily_Quota_users as $quser ) {

     $u_id = $quser->ID;
     $reset_quota = '10';
     update_user_meta( $u_id, 'download_quota', $reset_quota);
     }	

}*/

//denide wp-admin access to subscriber

 /*function wpse66094_no_admin_access() {
    $redirect = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : home_url( '/' );
    global $current_user;
    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);
    if($user_role === 'subscriber'){
        exit( wp_redirect( $redirect ) );
    }
 }

add_action( 'admin_init', 'wpse66094_no_admin_access', 100 );*/ 