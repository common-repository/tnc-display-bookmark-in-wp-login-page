<?php
/**
 * @package tnc-display-bookmark-in-wp-login-page
 * @version 1.6
 */
/*
Plugin Name: TNC Display Bookmark In WP-Login Page
Plugin URI: http://wordpress.org/plugins/tnc-display-bookmark-in-wp-login-page/
Description: This plugin enable link manager and display all links added by link manager in wp-login page.
Author: tunaucom
Version: 1.6
Author URI: http://anybuy.vn/tu-com-cong-nghiep.htm
*/
function tnc_custom_login_logo() {
	echo '<style type="text/css">
		.login h1 { display: none; !important; }
	#loginform { border-radius: 5px !important; }
	</style>';
}
add_action('login_head', 'tnc_custom_login_logo');
function tnc_my_loginfooter() {
    echo '<div style="width: 320px;padding: 5px 0;margin: 10px auto; border-left: 4px solid #ff0000; background-color: #fff;
-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1); box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);"><ul style="list-style: none; padding: 0 24px;">';
	$bookmarks = get_bookmarks( array(
	'orderby'        => 'name',
	'order'          => 'ASC',
	));

	foreach ( $bookmarks as $bookmark ) { 
		printf('<li><a style="text-decoration: none;" href="%s" rel="me" title="%s" target="_blank">→ %s</a></li>', $bookmark->link_url, $bookmark->link_description, $bookmark->link_name);
	}
	echo '</ul></div>';
}
add_action('login_footer','tnc_my_loginfooter');
add_filter( 'pre_option_link_manager_enabled', '__return_true' );
?>