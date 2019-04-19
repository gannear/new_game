<?php
/*
Template Name: User Logout
*/

wp_logout();

wp_redirect( get_home_url() );
exit;

?>