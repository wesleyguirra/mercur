<?php
/*
Plugin Name: ez Ajax Search
Plugin URI: http://ez-ajax-search.ezplugins.de/
Description: ez Ajax Search allows your visitors to search your WordPress site in real time without having to reload the page. Get instant results of selected post types such as pages, posts and even WooCommerce products. The plugin is simple to use and comes with an intuitive user interface that lets you create an ajax search feature within minutes!
Version: 1.0.0
Author: Michael Schuppenies
Author URI: http://www.ezplugins.de/
*/

defined( 'ABSPATH' ) OR exit;

if (defined("EZAS_VERSION")) return;

/**
	setup
**/
define("EZAS_VERSION", "1.0.0");
define("EZAS_PATH", plugin_dir_path(__FILE__));
define("EZAS_SLUG", plugin_basename(__FILE__));

// ez functions
require_once(EZAS_PATH . "/class.ezas_functions.php");

/**
	uninstall
**/
function ezas_uninstall() {
	require_once(EZAS_PATH . "/ezas-uninstall.php");
}

// hooks
register_uninstall_hook(__FILE__, "ezas_uninstall");


class EZ_Ajax_Search {
	/**
		init plugin
	**/
	static function init() {
		// setup pages
		add_action("admin_menu", array(__CLASS__, "admin_menu"));
		// register cpt
		add_action("init", array(__CLASS__, "register_cpt"));
		// load languages
		add_action("init", array(__CLASS__, "load_language"));
		// widget
		add_action("widgets_init", array(__CLASS__, "register_widget"));

		// load backend scripts / styles
		add_action("admin_enqueue_scripts", array(__CLASS__, "load_scripts"));

		// ajax frontend
		add_action("wp_ajax_ezas_frontend", array(__CLASS__, "ajax_frontend"));
		add_action("wp_ajax_nopriv_ezas_frontend", array(__CLASS__, "ajax_frontend"));

		if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
			require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
		}

		// shortcode
		require_once(EZAS_PATH . "/shortcode.php");
	}

	/**
		admin pages
	**/
	static function admin_menu() {
		// setup pages
		$role = "manage_options";

		add_submenu_page("edit.php?post_type=ezas_search_forms", __("Settings", "ezas"), __("Settings", "ezas"), $role, "ezas-settings", array(__CLASS__, "page_settings"));

		// custom post type
		require_once(EZAS_PATH . "/custom-post-type.php");
	}

	/**
		custom post type
	**/
	static function register_cpt() {
		require_once(EZAS_PATH . "/custom-post-type.php");
	}

	/**
		scripts
	**/
	static function load_scripts($page, $force_load=false) {
		if (!$force_load && !stristr($page, "ezas_search_forms_page")) return;

		wp_enqueue_style("jquery-ui", plugins_url("assets/css/jquery-ui.min.css", __FILE__));
		wp_enqueue_style("ezas-jquery-ui-theme", plugins_url("assets/css/jquery-ui.theme.min.css", __FILE__));

		wp_enqueue_script("jquery");
		wp_enqueue_script("jquery-ui-core");
		wp_enqueue_script("jquery-ui-mouse");
		wp_enqueue_script("jquery-ui-widget");
		wp_enqueue_script("jquery-ui-dialog");
		wp_enqueue_script("jquery-ui-tabs");
	}

	/**
		pages
	**/
	static function page_settings() {
		require_once(EZAS_PATH . "/page-settings.php");
	}

	static function page_update() {
		require_once(EZAS_PATH . "/page-update.php");
	}

	/**
		ajax
	**/
	// frontend
	static function ajax_frontend() {
		require_once(EZAS_PATH . "/ajax.php");
	}


	/**
		language domain
	**/
	static function load_language() {
		load_plugin_textdomain('ezas', false, dirname(plugin_basename(__FILE__)) . '/languages/');
	}

	/**
		widget
	**/
	static function register_widget() {
		require_once(EZAS_PATH . "/widget.php");

		return register_widget("EZ_Ajax_Search_Widget");
	}
}
EZ_Ajax_Search::init();