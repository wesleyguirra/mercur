<?php

defined( 'ABSPATH' ) OR exit;

if (empty($_POST["data"])) die();

// parse data
parse_str($_POST["data"], $data);
if (empty($data["id"]) || empty($data["search"])) die();

// get post
$post = get_post($data["id"]);
if (empty($post)) die();

// search form settings
$cache_results = get_post_meta($post->ID, "caching", true);
$count         = get_post_meta($post->ID, "count", true);
$post_types    = get_post_meta($post->ID, "post_types", true);
$text_empty    = get_post_meta($post->ID, "text_empty", true);

// search form styling
$post_heading_tag        = get_post_meta($post->ID, "post_heading_tag", true);
$post_excerpt_tag        = get_post_meta($post->ID, "post_excerpt_tag", true);
$featured_image_position = get_post_meta($post->ID, "featured_image_position", true);
$show_categories         = get_post_meta($post->ID, "show_categories", true);
$show_tags               = get_post_meta($post->ID, "show_tags", true);

// output builder
$output_builder    = get_post_meta($post->ID, "output_builder", true);
$output_fields_tmp = explode(",", $output_builder);
$output_fields     = array();

foreach ($output_fields_tmp as $tmp_field) {
	$output_fields[] = trim(strtolower($tmp_field));
}

// search already!
$args = array(
	'post_type'      => $post_types,
	'post_status'    => 'publish',
	's'              => $data["search"],
	'pagination'     => false,
	'posts_per_page' => $count,
	'cache_results'  => $cache_results
);

// The Query
$query = new WP_Query($args);

$search_result = array();

// no posts found
if (empty($query->posts)) {
	$search_result[] = "<div class='ezas-empty'>{$text_empty}</div>";
}
// build posts output array
else {
	foreach ($query->posts as $post) {
		$post_title     = $post->post_title;
		$post_excerpt   = $post->post_excerpt;
		$post_permalink = get_permalink($post->ID);

		$output  = "<div class='ezas-post ezas-image-{$featured_image_position}'>";
		$output .= "<a class='ezas-link' href='{$post_permalink}'></a>";

		foreach ($output_fields as $field) {
			// skip if empty
			if (empty($field)) continue;

			switch ($field) {
				// clearfix
				case "clear":
					$output .= "<div class='ezas-clear'></div>";
				break;

				// categories
				case "categories":
					$cat_args = array(
						"echo"     => 0,
						"number"   => get_post_meta($post->ID, "show_categories_count", true),
						"title_li" => ""
					);

					if ($post->post_type == "product") {
						$cat_args["taxonomy"] = "product_cat";
					}

					$output .= "<ul class='ezas-categories'>";
					$output .= wp_list_categories($cat_args);
					$output .= "</ul>";
				break;

				// show excerpt
				case "excerpt":
					if (!empty($post_excerpt)) {
						$output .= "<{$post_excerpt_tag} class='ezas-excerpt'>" . apply_filters("the_excerpt", $post_excerpt) . "</{$post_excerpt_tag}>";
					}
				break;

				// show featured image
				case "image":
					$post_image = get_the_post_thumbnail($post->ID, "thumbnail", array("class" => "ezas-image"));
					
					if (!empty($post_image)) {
						$output .= $post_image;
					}
				break;

				// woocommerce price
				case "price":
					if (class_exists("WC_Product")) {
						$product      = new WC_Product($post->ID);
						$price_output = $product->get_price_html();
					}
					else {
						$price        = get_post_meta($post->ID, "_price", true);
						$price_output = "<p class='price'><span class='amount'>" . apply_filters("the_content", $price) . "</span></p>";
					}

					$output .= $price_output;
				break;

				// tags
				case "tags":
					$tag_args = array(
						"echo"     => 0,
						"number"   => get_post_meta($post->ID, "show_tags_count", true),
						"taxonomy" => "post_tag",
						"title_li" => ""
					);

					if ($post->post_type == "product") {
						$tag_args["taxonomy"] = "product_tag";
					}

					$output .= "<ul class='ezas-tags'>";
					$output .= wp_list_categories($tag_args);
					$output .= "</ul>";
				break;

				// show title
				case "title":
					$output .= "<{$post_heading_tag} class='ezas-title'>" . apply_filters("the_title", $post_title) . "</{$post_heading_tag}>";
				break;

				// special fields
				default:
					$field_array = explode("::", $field);

					// plain text
					if (count($field_array) < 2) {
						$output .= "<div class='ezas-field-text-plain'>" . apply_filters("the_content", $field) . "</div>";
					}
					else {
						// post meta
						if ($field_array[0] == "post_meta") {
							$field_value = get_post_meta($post->ID, $field_array[1], true);

							$output .= "<div class='ezas-field-post-meta'>" . apply_filters("the_content", $field_value) . "</div>";
						}
					}
				break;
			}
		}

		// post end
		$output .= "</div>";

		$search_result[] = $output;
	}
}

wp_reset_query();

echo implode("", $search_result);

die();