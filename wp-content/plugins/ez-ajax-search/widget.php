<?php

defined( 'ABSPATH' ) OR exit;

class EZ_Ajax_Search_Widget extends WP_Widget {
	public static $fields;

	function __construct() {
		parent::__construct(
			'EZ_Ajax_Search_Widget',
			__('ez Ajax Search', 'ezas'),
			array( 'description' => __( 'List posts', 'ezas' ), )
		);

		self::$fields = array(
			"title" => array(
				"title" => __("Title", "ezas"),
				"type"  => "input",
				"value" => ""
			),
			"form_id" => array(
				"title" => __("Search Form", "ezas"),
				"type"  => "search_form",
				"value" => ""
			)
		);
	}

	public function widget( $args, $instance ) {
		$title = !empty($instance["title"]) ? apply_filters( 'widget_title', $instance['title'] ) : "";
		$id    = !empty($instance["form_id"]) ? $instance['form_id'] : "";

		echo $args['before_widget'];

		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		$shortcode = "[ezas id='{$id}' /]";
		echo do_shortcode($shortcode);

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$out = "";

		foreach (self::$fields as $field_name => $field) {
			$input_id    = $this->get_field_id($field_name);
			$input_name  = $this->get_field_name($field_name);
			$input_value = isset($instance[$field_name]) ? $instance[$field_name] : $field["value"];

			$out .= "<p>";
			$out .= "	<label for='{$input_id}'>{$field["title"]}</label>";

			switch ($field["type"]) {
				case "dropdown":
					$out .= "<select class='widefat' name='{$field_name}' id='{$input_id}'>";

					foreach ($field["options"] as $option_value => $option_label) {
						$selected = "";
						if ($field_value == $option_value) $selected="selected";

						$out .= "<option value='{$option_value}' {$selected}>{$option_label}</option>";
					}

					$out .= "</select>";
				break;

				case "input":
					$field_value = esc_attr($input_value);

					$out .= "<input class='widefat' name='{$input_name}' id='{$input_id}' type='text' value='{$field_value}' />";
				break;

				case "number":
					$field_value = esc_attr($input_value);

					$out .= "<input class='widefat' name='{$input_name}' id='{$input_id}' type='number' value='{$field_value}' />";
				break;

				case "post_types":
					$options = get_post_types(array(
    					"public" => true
    				));

    				$out .= "<select class='widefat' id='{$input_id}' name='{$input_name}[]' multiple>";

    				foreach ($options as $v => $desc) {
    					$selected = "";
    					if (in_array($v, $input_value)) $selected = "selected='selected'";

    					$out .= "<option value='{$v}' {$selected}>" . $desc . "</option>";
    				}

    				$out .= "</select>";
				break;

				case "search_form":
					$options = get_posts(array(
						"post_status" => "publish",
						"posts_per_page" => 999,
						"post_type" => "ezas_search_forms"
					));

					array_unshift($options, array());

    				$out .= "<select class='widefat' id='{$input_id}' name='{$input_name}'>";

    				foreach ($options as $post) {
    					$selected = "";
    					
    					$id    = empty($post->ID) ? 0 : $post->ID;
    					$title = empty($post->post_title) ? "" : $post->post_title;

    					if (!empty($id) && $input_value == $id) $selected = "selected='selected'";

    					$out .= "<option value='{$id}' {$selected}>{$title}</option>";
    				}

    				$out .= "</select>";
				break;
			}

			$out .= "</p>";
		}

		echo $out;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();

		foreach (self::$fields as $name => $field) {
			if (!empty($new_instance[$name])) {
				if (is_array($field)) {
					$new_value = $new_instance[$name];
				}
				else {
					$new_value = strip_tags($new_instance[$name]);
				}

				$instance[$name] = $new_value;
			}
			else {
				$instance[$name] = "";
			}
		}

		return $instance;
	}
}