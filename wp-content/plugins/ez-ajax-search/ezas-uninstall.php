<?php

defined( 'ABSPATH' ) OR exit;
if (!current_user_can('activate_plugins')) return;

// quit if data should be kept
if (get_option("ezas_uninstall_keep_data", 0) == 1) return;

global $wpdb;

// remove search forms + meta data
$query = "
DELETE
	p, pm FROM {$wpdb->prefix}posts as p
JOIN
	{$wpdb->prefix}postmeta as pm on pm.post_id = p.id
WHERE
	p.post_type = 'ezas_search_forms'";

$wpdb->query($query);

// remove options
$settings = array(
	"debug_mode",
	"purchase_code",
	"uninstall_keep_data"
);

foreach ($settings as $s) {
	delete_option("ezas_{$s}");
}