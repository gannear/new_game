<?php
if ( function_exists('register_sidebar') )
    
	//custom widget for footer widget 1
	register_sidebar( array(
		'name' => 'Footer Area #1',
		'id' => 'footer-area1',
		'before_widget' => '<div id="footer_area1" class="footer_area1">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
    
?>