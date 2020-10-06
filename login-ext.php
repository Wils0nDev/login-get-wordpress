<?php 
/**
 * Template Name: login externo
*/



global $wpdb;
function autenticathe_int($user_login,$user) {
     
	wp_redirect( home_url('/wp-admin') );

}

$creds = array(
        'user_login'    => $_GET['user'],
        'user_password' => $_GET['pass'],
        'remember'      => true
 );

$user = wp_signon( $creds, false );
$userID = $user->ID;
autenticathe_int($user->user_login,$user );

if (is_wp_error($user))   {  
        echo $user->get_error_message(); 
     } else{
		wp_set_current_user($userID, $user->user_login);
		wp_set_auth_cookie($userID);
		$rr = do_action( 'wp_login', 'autenticathe_int' );  
	}




?>