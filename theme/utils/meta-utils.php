<?php

function get_field($id, $key, $as = null) {
	$as = strtolower($as);
	$val = get_post_meta($id, $key, true);
	switch($as) {
		case 'date':
		case 'datetime':
		case 'time':
			return new \DateTime($val);
		case 'number':
			return (double) $val;
		case 'string':
			return (string) $val;
		default:
			return $val;
	}
}

function get_image_url($id, $size = 'thumbnail') {
	return wp_get_attachment_image_src($id, $size)[0];
}

function get_thumbnail_url($id, $size = 'thumbnail') {
	return get_image_url(get_post_thumbnail_id($id), $size);
}