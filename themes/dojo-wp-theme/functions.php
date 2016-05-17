<?php
include('theme-config.php');
add_theme_support( 'post-thumbnails' );
add_image_size( 'medium', 460, 308, true );
add_image_size( 'medium_large', 700, 500, true );

function my_admin_bar_init() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('admin_bar_init', 'my_admin_bar_init');

function my_scripts() {
	//CSS LIBRARY
	wp_enqueue_style(
		'boostrap_css',
		get_stylesheet_directory_uri() . '/lib/css/bootstrap.min.css'
	);
	wp_enqueue_style(
		'fontawesome',
		get_stylesheet_directory_uri() . '/lib/css/font-awesome.min.css'
	);
	wp_enqueue_style(
		'boostrap_social',
		get_stylesheet_directory_uri() . '/lib/css/bootstrap-social.css'
	);
	wp_enqueue_style(
		'ngProgress',
		get_stylesheet_directory_uri() . '/lib/css/ngProgress.css'
	);
	wp_enqueue_style(
		'blueimp-gallery',
		get_stylesheet_directory_uri() . '/lib/css/blueimp-gallery.min.css'
	);

	//JS LIBRARY
	wp_enqueue_script(
		'jquery',
		get_stylesheet_directory_uri() . '/lib/js/jquery.min.js'
	);
	wp_enqueue_script(
		'bootstrap_js',
		get_stylesheet_directory_uri() . '/lib/js/bootstrap.min.js'
	);
	wp_enqueue_script(
		'angularjs',
		get_stylesheet_directory_uri() . '/lib/js/angular.min.js'
	);
	wp_enqueue_script(
		'angularjs-route',
		get_stylesheet_directory_uri() . '/lib/js/angular-route.min.js'
	);
	wp_enqueue_script(
		'angularjs-sanitize',
		get_stylesheet_directory_uri() . '/lib/js/angular-sanitize.min.js'
	);
	wp_enqueue_script(
		'angularjs-cookies',
		get_stylesheet_directory_uri() . '/lib/js/angular-cookies.min.js'
	);
	wp_enqueue_script(
		'angulike',
		get_stylesheet_directory_uri() . '/lib/js/angulike.js'
	);
	wp_enqueue_script(
		'angulartics',
		get_stylesheet_directory_uri() . '/lib/js/angulartics.min.js'
	);
	wp_enqueue_script(
		'angulartics-google',
		get_stylesheet_directory_uri() . '/lib/js/angulartics-google-analytics.min.js'
	);
	wp_enqueue_script(
		'ngprogress',
		get_stylesheet_directory_uri() . '/lib/js/ngprogress.min.js'
	);
	wp_enqueue_script(
		'blueimp-gallery_js',
		get_stylesheet_directory_uri() . '/lib/js/blueimp-gallery.min.js'
	);
	wp_enqueue_script(
		'ui-bootstrap',
		get_stylesheet_directory_uri() . '/lib/js/ui-bootstrap-tpls.min.js'
	);
	wp_enqueue_script(
		'angular-cookie-law_js',
		get_stylesheet_directory_uri() . '/lib/js/angular-cookie-law.min.js'
	);
	wp_enqueue_style(
		'angular-cookie-law_css',
		get_stylesheet_directory_uri() . '/lib/css/angular-cookie-law.min.css'
	);

	//JS third-party
	wp_enqueue_script(
		'twitter',
		get_stylesheet_directory_uri() . '/js/third-party/twitter.js'
	);
	wp_enqueue_script(
		'facebook',
		get_stylesheet_directory_uri() . '/js/third-party/facebook.js'
	);
	wp_enqueue_script(
		'google-analystic',
		get_stylesheet_directory_uri() . '/js/third-party/google-analystic.js'
	);
	wp_enqueue_script(
		'iubenda',
		get_stylesheet_directory_uri() . '/js/third-party/iubenda.js'
	);

	//MY CSS
	wp_enqueue_style(
		'style',
		get_stylesheet_directory_uri() . '/style.css'
	);
	wp_enqueue_style(
		'mailchimp',
		get_stylesheet_directory_uri() . '/css/mailchimp.css'
	);

	//MY SCRIPT
	wp_enqueue_script(
		'controllers',
		get_stylesheet_directory_uri() . '/js/controllers.js'
	);
	wp_enqueue_script(
		'services',
		get_stylesheet_directory_uri() . '/js/services.js'
	);
	wp_enqueue_script(
		'filters',
		get_stylesheet_directory_uri() . '/js/filters.js'
	);
	wp_enqueue_script(
		'my-scripts',
		get_stylesheet_directory_uri() . '/js/app.js',
		array( 'angularjs', 'angularjs-route' , 'controllers', 'services', 'filters')
	);
	wp_localize_script(
		'my-scripts',
		'myLocalized',
		array(
			'partials' => trailingslashit( get_template_directory_uri() ) . 'partials/',
			'img' => trailingslashit( get_template_directory_uri() ) . 'img/',
			'json' => trailingslashit( get_template_directory_uri() ) . 'json/',
			'eb' => array('url' => EVENTBRITE_URL,
										'date' => EVENTBRITE_DATE)
			)
	);
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );
