<?php
/*
Template Name: User Logout Arabic
*/

wp_logout();

wp_redirect( get_home_url().'/?lang=ar');
//wp_redirect( icl_get_home_url());
exit;

?>