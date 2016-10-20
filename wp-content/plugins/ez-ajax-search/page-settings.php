<?php

defined( 'ABSPATH' ) OR exit;

if (isset($_POST["submit"])) {
	foreach ($_POST["opt"] as $k => $v) {
		$sanitized_key   = sanitize_text_field($k);
		$sanitized_value = sanitize_text_field($v);

		update_option("ezas_{$sanitize_text_field}", $sanitized_value);
	}

	$updated = 1;
}

// global settings
$settings_alt = array(
	__("Styling", "ezas") => array(
		"load_custom_styling" => array(
			"description"      => __("Load custom styling", "ezas"),
			"description_long" => __("Only enable this option if you want to use the colors below. Make sure to set the theme to 'custom' in the search forms.", "ezas"),
			"type"             => "yesno",
			"default"          => 0
		),
		"css_post_background_color" => array(
			"description" => __("Post background color", "ezas"),
			"type" => "colorpicker",
			"default" => "#ffffff"
		),
		"css_post_background_color_hover" => array(
			"description" => __("Post background hover color", "ezas"),
			"type" => "colorpicker",
			"default" => "#d8d8d8"
		),
		"css_post_text_color" => array(
			"description" => __("Post text color", "ezas"),
			"type" => "colorpicker",
			"default" => "#222222"
		),
		"css_post_text_color_hover" => array(
			"description" => __("Post text hover color", "ezas"),
			"type" => "colorpicker",
			"default" => "#444444"
		),
		"css_categories_background_color" => array(
			"description" => __("Categories background color", "ezas"),
			"type" => "colorpicker",
			"default" => "#eeeeee"
		),
		"css_tags_background_color" => array(
			"description" => __("Tags background color", "ezas"),
			"type" => "colorpicker",
			"default" => "#eeeeee"
		),
		"css_border_color" => array(
			"description" => __("Wrapper border color", "ezas"),
			"type" => "colorpicker",
			"default" => "#eeeeee"
		),
		"css_results_width" => array(
			"description" => __("Result box width", "ezas"),
			"description_long" => __("Leave blank for default width.", "ezas"),
			"type" => "dimensions",
			"units" => array("px", "em", "%")
		),
		"css_image_width" => array(
			"description" => __("Image width", "ezas"),
			"description_long" => __("Leave blank for default width.", "ezas"),
			"type" => "dimensions",
			"units" => array("px", "em", "%")
		)
	),
	__("Other", "ezas") => array(
		"debug_mode" => array(
			"description"      => __("Enable debug mode", "ezas"),
			"description_long" => __("Only enable this option for debugging purposes", "ezas"),
			"type"             => "yesno"
		),
		"uninstall_keep_data" => array(
			"description"      => __("Keep data after uninstall", "ezas"),
			"description_long" => __("The plugin will keep all plugin-related data in the databse when uninstalling. Only select 'Yes' if you want to upgrade the script.", "ezas"),
			"type"             => "yesno"
		)
	)
);
$settings = json_decode(json_encode($settings_alt));

// categorize settings
$settings_cat = array();
foreach ($settings as $cat => $s) {
	$settings_cat[$cat] = $s;
}

?>

<div class="ezas wrap">
	<h2>ez Ajax Search v<?php echo EZAS_VERSION; ?></h2> 

	<?php
	if (isset($updated)) {
		?>

		<div id="message" class="updated"><?php echo __("Settings saved.", "ezas"); ?></div>

		<?php
	}
	?>

	<form method="POST" name="ezas-form" class="ezas-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<div id="tabs">
			<ul>
				<?php
				$tabs = array_keys($settings_cat);

				foreach ($tabs as $i => $cat) {
					echo "<li><a href='#tab-{$i}'>{$cat}</a></li>";
				}
				?>
			</ul>

		    <?php

		    $tab_i = 0;
		    foreach ($settings_cat as $cat_name => $cat) {
		    	?>

				<div id="tab-<?php echo $tab_i; ?>">
					<?php
					echo Ezas_Functions::get_settings_table($cat, "opt", "opt");
					?>
				</div>

				<?php

				$tab_i++;
			}
			?>
		</div>

		<!-- save -->
		<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo __("Save", "ezas"); ?>" /></p>
	</form>
</div>

<script>
jQuery(document).ready(function($) {
	$("#tabs").tabs();
});
</script>