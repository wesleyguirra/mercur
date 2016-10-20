<?php

defined( 'ABSPATH' ) OR exit;

/**
	shortcode
**/
class EZ_Ajax_Search_Shortcode {
	static $add_script;
	static $form_id;

	static function init() {
		add_shortcode('ezas', array(__CLASS__, 'get_output'));

		add_action('init', array(__CLASS__, 'register_script'));
		add_action('wp_footer', array(__CLASS__, 'print_script'));
	}

	static function get_output($atts) {
		self::$add_script = true;

		extract(shortcode_atts(array(
			"id"   => null,
			"name" => null
		), $atts));

		// check for empty id
		if (empty($id) && empty($name)) {
			return __("ez Ajax Search error: no ID selected.", "ezas");
		}

		// get id by name
		if (!empty($name)) {
			$sf_query = get_posts(array(
				"post_name"   => $name,
				"post_type"   => "ezas_search_forms",
				"numberposts" => 1
			));

			if (!$sf_query) {
				return __("ez Ajax Search error: no search form found with name '{$name}'.", "ezas");
			}

			$id = $sf_query[0]->ID;
		}

		self::$form_id = $id;

		$settings = json_encode(array(
			"caching"    => get_post_meta($id, "caching", true),
			"count"      => get_post_meta($id, "count", true),
			"id"         => $id,
			"min_length" => get_post_meta($id, "min_length", true),
			"text_empty" => get_post_meta($id, "text_empty", true)
		));

		$result_wrapper_position = get_post_meta($id, "result_wrapper_position", true);
		$theme                   = get_post_meta($id, "theme", true);
		if (empty($theme)) $theme = "default";

		// search text + icon
		$search_text = get_post_meta($id, "text_searching", true);
		$search_icon = get_post_meta($id, "loading_icon", true);
		if (!empty($search_icon)) {
			$search_text = "<img src='" . plugins_url("assets/img/loading-icons/" . $search_icon, __FILE__) . "' alt='{$search_text}' class='ezas-loading-icon' /> " . $search_text;
		}

		// plugin form
		$use_form         = get_post_meta($id, "use_form", true);
		$placeholder_text = get_post_meta($id, "form_placeholder_text", true);
		$button_text      = get_post_meta($id, "form_button_text", true);

		// start output
		$out = "<div class='ezas-wrapper ezas-theme-{$theme}' data-id='{$id}' data-settings='{$settings}'>";

		// use search from from theme
		if ($use_form == "default") {
			$out .= get_search_form(false);
		}
		// use custom search form
		else {
			$out .= "<form method='get' class='searchform' action='" . home_url("/") . "'>
				<input autocomplete='off' placeholder='{$placeholder_text}' class='search-field' type='text' name='s' id='s' />
				<input type='submit' class='search-submit' name='Submit' value='{$button_text}' />
			</form>";
		}

		$out .= "<div class='ezas-clear'><span class='ezas-clear-button'></span></div>";
		$out .= "<div class='ezas-results {$result_wrapper_position}'></div>";
		$out .= "<div class='ezas-searching {$result_wrapper_position}'>{$search_text}</div>";
		$out .= "</div>";

		return $out;
	}

	static function register_script() {
		wp_enqueue_style("ezas-css-frontend", plugins_url("assets/css/ezas-frontend.css", __FILE__), array(), EZAS_VERSION);

		// add custom styling
		if (get_option("ezas_load_custom_styling", 0)) {
			$custom_css = array(
				"border_color"          => get_option("ezas_css_border_color"),
				"categories_background" => get_option("ezas_css_categories_background_color"),
				"image_width"           => get_option("ezas_css_image_width"),
				"post_background"       => get_option("ezas_css_post_background_color"),
				"post_background_hover" => get_option("ezas_css_post_background_color_hover"),
				"post_text_color"       => get_option("ezas_css_post_text_color"),
				"post_text_color_hover" => get_option("ezas_css_post_text_color_hover"),
				"results_width"         => get_option("ezas_css_results_width"),
				"tags_background"       => get_option("ezas_css_tags_background_color")
			);

			$css_output = "
				.ezas-theme-custom .ezas-searching, .ezas-theme-custom .ezas-post, .ezas-theme-custom .ezas-empty {
					background-color: {$custom_css["post_background"]};
					color: {$custom_css["post_text_color"]};
				}

				.ezas-theme-custom .ezas-results, .ezas-theme-custom .ezas-searching {
					border: {$custom_css["border_color"]} 1px solid;
				}

				.ezas-theme-custom .ezas-post {
					border-bottom: {$custom_css["border_color"]} 1px solid;
				}

				.ezas-theme-custom .ezas-categories li {
					background-color: {$custom_css["categories_background"]};
				}
				.ezas-theme-custom .ezas-tags li {
					background-color: {$custom_css["tags_background"]};
				}
				.ezas-theme-custom .ezas-categories li a, .ezas-theme-custom .ezas-tags li a {
					color: {$custom_css["post_text_color"]};
				}
			";

			// post background hover color
			if (!empty($custom_css["post_background_hover"])) {
				$css_value = "{$custom_css["post_background_hover"]}";

				$css_output .= ".ezas-theme-custom .ezas-post:hover {
					background-color: {$css_value};
				}";
			}

			// post text hover color
			if (!empty($custom_css["post_text_color_hover"])) {
				$css_value = "{$custom_css["post_text_color_hover"]}";

				$css_output .= ".ezas-theme-custom .ezas-post:hover {
					color: {$css_value};
				}";
			}

			// result box width
			if (!empty($custom_css["results_width"]) && !empty($custom_css["results_width"]["value"])) {
				$css_value = "{$custom_css["results_width"]["value"]}{$custom_css["results_width"]["unit"]}";

				$css_output .= ".ezas-theme-custom .ezas-results, .ezas-theme-custom .ezas-searching {
					width: {$css_value};
				}";
			}

			// image width
			if (!empty($custom_css["image_width"]) && !empty($custom_css["image_width"]["value"])) {
				$css_value = "{$custom_css["image_width"]["value"]}{$custom_css["image_width"]["unit"]}";
				
				$css_output .= ".ezas-theme-custom .ezas-image-left img, .ezas-theme-custom .ezas-image-right img {
					width: {$css_value};
					max-width: {$css_value};
				}";
			}

			wp_add_inline_style("ezas-css-frontend", $css_output);
		}
	}

	static function print_script() {
		if ( ! self::$add_script )
			return;

		wp_enqueue_script("jquery");

		// load minified version
		$debug_mode = get_option("ezas_debug_mode", 0);
		if ($debug_mode == 0) {
			wp_enqueue_script("ezas-frontend", plugins_url("assets/js/ezas-frontend.min.js", __FILE__), array("jquery"), EZAS_VERSION);
		}
		else {
			wp_enqueue_script("ezas-frontend", plugins_url("assets/js/ezas-frontend.js", __FILE__), array("jquery"), microtime(true));
		}

		wp_localize_script("ezas-frontend", "ezas_vars", array(
			"ajaxurl"    => admin_url("admin-ajax.php"),
			"debug_mode" => $debug_mode
		));
	}
}
EZ_Ajax_Search_Shortcode::init();