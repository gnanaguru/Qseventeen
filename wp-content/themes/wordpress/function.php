<?php
register_nav_menus( array(
		'top'    => __( 'Footer Menu', 'footer-menu' ),
	) );

function qseventeen_widget_start(){
	register_sidebar( array(
	    'id'          => 'frontpage-action',
	    'name'        => __( 'Action section', 'wordpress' ),
	    'description' => __( 'This sidebar is located below the content section(above the footer).', 'wordpress' ),
	) );


	add_theme_support( 'customize-selective-refresh-widgets' );
}

add_action( 'widgets_init', 'qseventeen_widget_start' );
