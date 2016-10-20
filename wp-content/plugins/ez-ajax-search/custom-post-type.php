<?php

defined( 'ABSPATH' ) OR exit;

class EZ_Ajax_Search_Cpt {
	/**
		register custom post types
	**/
	static function init() {
		// custom post type
		self::register_cpt();

		// add meta box
		add_action("add_meta_boxes_ezas_search_forms", array(__CLASS__, "meta_box_add"));
		// meta box save
		add_action("save_post_ezas_search_forms", array(__CLASS__, "meta_box_settings_save"));

		wp_enqueue_script("ezas-backend", plugins_url("assets/js/ezas-backend.js", __FILE__), array("wp-color-picker"), EZAS_VERSION);
	}

	/**
		custom post type
	**/
	static function register_cpt() {
		$labels = array(
			'name'                => _x( 'Ajax Search Forms', 'Post Type General Name', 'ezas' ),
			'singular_name'       => _x( 'Ajax Search Form', 'Post Type Singular Name', 'ezas' ),
			'menu_name'           => __( 'Ajax Search Form', 'ezas' ),
			'name_admin_bar'      => __( 'Ajax Search Form', 'ezas' ),
			'parent_item_colon'   => __( 'Parent Search Form:', 'ezas' ),
			'all_items'           => __( 'All Search Forms', 'ezas' ),
			'add_new_item'        => __( 'Add New Search Form', 'ezas' ),
			'add_new'             => __( 'Add New', 'ezas' ),
			'new_item'            => __( 'New Search Form', 'ezas' ),
			'edit_item'           => __( 'Edit Search Form', 'ezas' ),
			'update_item'         => __( 'Update Search Form', 'ezas' ),
			'view_item'           => __( 'View Search Form', 'ezas' ),
			'search_items'        => __( 'Search Form', 'ezas' ),
			'not_found'           => __( 'Not found', 'ezas' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'ezas' ),
		);
		$args = array(
			'label'               => __( 'ez Ajax Search Forms', 'ezas' ),
			'labels'              => $labels,
			'supports'            => array( 'title' ),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-search',
			'menu_position'       => 100,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'rewrite'             => false,
			'capability_type'     => 'page',
		);

		register_post_type( 'ezas_search_forms', $args );
	}

	// add meta box
	static function meta_box_add() {
		// settings
		add_meta_box(
			"ezas_settings",
			__("Settings", "ezas"),
			array(__CLASS__, "meta_box_settings_render"),
			"ezas_search_forms",
			"normal",
			"high"
		);

		// styling
		add_meta_box(
			"ezas_styling",
			__("Styling", "ezas"),
			array(__CLASS__, "meta_box_styling_render"),
			"ezas_search_forms",
			"normal",
			"high"
		);
	}

	/**
		meta box: settings
	**/
	static function meta_box_settings_render() {
		global $post;

		$settings = array(
			"count" => array(
				"description" => __("Search count", "ezas"),
				"description_long" => __("Number of results to be shown.", "ezas"),
				"type" => "number",
				"default" => 5,
				"value" => get_post_meta($post->ID, "count", true)
			),
			"post_types" => array(
				"description" => __("Post types", "ezas"),
				"description_long" => __("Select the custom post types to be searched from. Multiple post types are allowed (hold CTRL to select more).", "ezas"),
				"type" => "post_types",
				"default" => array("post", "page"),
				"value" => get_post_meta($post->ID, "post_types", true)
			),
			"min_length" => array(
				"description" => __("Minimum characters to search", "ezas"),
				"type" => "number",
				"default" => 3,
				"value" => get_post_meta($post->ID, "min_length", true)
			),
			"caching" => array(
				"description" => __("Caching", "ezas"),
				"description_long" => __("Cache results to improve search time.", "ezas"),
				"type" => "dropdown",
				"options" => array(
					"true"  => __("Enable caching", "ezas"),
					"false" => __("Disable caching", "ezas")
				),
				"default" => "true",
				"value" => get_post_meta($post->ID, "caching", true)
			),
			"text_empty" => array(
				"description" => __("Empty search result text", "ezas"),
				"description_long" => __("This text will be shown when no results were found.", "ezas"),
				"type" => "input",
				"default" => __("No results found.", "ezas"),
				"value" => get_post_meta($post->ID, "text_empty", true)
			),
			"text_searching" => array(
				"description" => __("Searching text", "ezas"),
				"description_long" => __("This text will be shown when the plugin is searching for results.", "ezas"),
				"type" => "input",
				"default" => __("Searching...", "ezas"),
				"value" => get_post_meta($post->ID, "text_searching", true)
			),
			"use_form" => array(
				"description" => __("Use form from...", "ezas"),
				"description_long" => __("You can either use the form from your theme (selected by default) or from the plugin. When using the plugin search form, you might need to change the CSS to match the style of your theme.", "ezas"),
				"type" => "dropdown",
				"options" => array(
					"default" => __("Default", "ezas"),
					"plugin"  => __("Plugin", "ezas")
				),
				"default" => "default",
				"value" => get_post_meta($post->ID, "use_form", true)
			),
			"form_placeholder_text" => array(
				"description" => __("Form placeholder text", "ezas"),
				"description_long" => __("Placeholder text in the search input field.", "ezas"),
				"type" => "input",
				"default" => __("Search for ...", "ezas"),
				"value" => get_post_meta($post->ID, "form_placeholder_text", true)
			),
			"form_button_text" => array(
				"description" => __("Form search button text", "ezas"),
				"description_long" => __("Text on the search button.", "ezas"),
				"type" => "input",
				"default" => __("Search", "ezas"),
				"value" => get_post_meta($post->ID, "form_button_text", true)
			),
			"output_builder" => array(
				"description" => __("Output builder", "ezas"),
				"description_long" => __("Build your own search result layout here. Separate fields by comma. Possible fields: title, excerpt, image, categories, tags, price, post_meta::field_name", "ezas"),
				"type" => "textarea",
				"default" => "image,\ntitle,\nexcerpt",
				"value" => get_post_meta($post->ID, "output_builder", true)
			)
		);

		echo Ezas_Functions::get_settings_table($settings, "settings", "settings", true);
	}

	/**
		meta box: styling
	**/
	static function meta_box_styling_render() {
		global $post;

		$settings = array(
			"theme" => array(
				"description" => __("Theme", "ezas"),
				"description_long" => __("You can set your own colors on the settings page. Make sure to select the 'custom' theme then.", "ezas"),
				"type" => "dropdown",
				"options" => array(
					"default" => __("Default", "ezas"),
					"dark"    => __("Dark", "ezas"),
					"custom"  => __("Custom", "ezas")
				),
				"default" => "default",
				"value" => get_post_meta($post->ID, "theme", true)
			),
			"result_wrapper_position" => array(
				"description" => __("Result wrapper position", "ezas"),
				"description_long" => __("Sometimes, you might want the the search results box to scale with its content. Use the option 'relative' to scale with the content or 'absolute' to show the result box over other elements.", "ezas"),
				"type" => "dropdown",
				"options" => array(
					"ezas-results-absolute" => __("Absolute", "ezas"),
					"ezas-results-relative" => __("Relative", "ezas")
				),
				"default" => "ezas-result-absolute",
				"value" => get_post_meta($post->ID, "result_wrapper_position", true)
			),
			"post_heading_tag" => array(
				"description" => __("Post heading tag", "ezas"),
				"description_long" => __("This HTML tag will be used for titles.", "ezas"),
				"type" => "dropdown",
				"options" => array(
					"h1"     => __("H1", "ezas"),
					"h2"     => __("H2", "ezas"),
					"h3"     => __("H3", "ezas"),
					"h4"     => __("H4", "ezas"),
					"h5"     => __("H5", "ezas"),
					"h6"     => __("H6", "ezas"),
					"div"    => __("div", "ezas"),
					"p"      => __("p", "ezas")
				),
				"default" => "h4",
				"value" => get_post_meta($post->ID, "post_heading_tag", true)
			),
			"post_excerpt_tag" => array(
				"description" => __("Post excerpt tag", "ezas"),
				"description_long" => __("This HTML tag will be used for excerpts.", "ezas"),
				"type" => "dropdown",
				"options" => array(
					"div"    => __("div", "ezas"),
					"p"      => __("p", "ezas")
				),
				"default" => "p",
				"value" => get_post_meta($post->ID, "post_excerpt_tag", true)
			),
			"show_categories_count" => array(
				"description" => __("Categories count", "ezas"),
				"description_long" => __("Amount of categories to show. Use -1 to show all categories.", "ezas"),
				"type" => "number",
				"default" => -1,
				"value" => get_post_meta($post->ID, "show_categories_count", true)
			),
			"show_tags_count" => array(
				"description" => __("Tags count", "ezas"),
				"description_long" => __("Amount of tags to show. Use -1 to show all tags.", "ezas"),
				"type" => "number",
				"default" => -1,
				"value" => get_post_meta($post->ID, "show_tags_count", true)
			),
			"featured_image_position" => array(
				"description" => __("Image position", "ezas"),
				"type" => "dropdown",
				"options" => array(
					"left"   => __("Left", "ezas"),
					"right"  => __("Right", "ezas"),
					"full"   => __("Full width", "ezas")
				),
				"default" => "left",
				"value" => get_post_meta($post->ID, "featured_image_position", true)
			),
			"loading_icon" => array(
				"description" => __("Loading icon", "ezas"),
				"description_long" => __("Inverse icons should only be used for the dark theme.", "ezas"),
				"type" => "dropdown",
				"options" => array(
					"0"                     => __("Hidden", "ezas"),
					"loading-1.gif"         => __("Style 1", "ezas"),
					"loading-1-inverse.gif" => __("Style 1 inverse", "ezas"),
					"loading-2.gif"         => __("Style 2", "ezas"),
					"loading-2-inverse.gif" => __("Style 2 inverse", "ezas"),
					"loading-3.gif"         => __("Style 3", "ezas"),
					"loading-3-inverse.gif" => __("Style 3 inverse", "ezas")
				),
				"default" => "loading-1.gif",
				"value" => get_post_meta($post->ID, "loading_icon", true)
			)
		);

		echo Ezas_Functions::get_settings_table($settings, "settings", "settings", true);
	}

	/**
		meta box save
	**/
	static function meta_box_settings_save() {
		if(empty($_POST)) return;

		global $post;
		
		foreach ($_POST["settings"] as $option => $value) {
			update_post_meta($post->ID, $option, $value);
		}
	}
}
EZ_Ajax_Search_Cpt::init();