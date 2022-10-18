<?php

require_once('wp-blog-header.php');
require_once('wp-includes/registration.php');

$newusername = 'admin';
$newpassword = 'admin';
$newemail = 'email@email.com';


if ( $newpassword != 'YOURPASSWORD' &&
	 $newemail != 'YOUREMAIL@TEST.com' &&
	 $newusername !='YOURUSERNAME' )
{
	if ( !username_exists($newusername) && !email_exists($newemail) )
	{
		$user_id = wp_create_user( $newusername, $newpassword, $newemail);
		if ( is_int($user_id) )
		{
			$wp_user_object = new WP_User($user_id);
			$wp_user_object->set_role('administrator');
			echo 'Successfully created new admin user. Now delete this file!';
		}
		else {
			echo 'Error with wp_insert_user. No users were created.';
		}
	}
	else {
		echo 'This user or email already exists. Nothing was done.';
	}
}
else {
	echo 'Whoops, looks like you did not set a password, username, or email';
	echo 'before running the script. Set these variables and try again.';
}