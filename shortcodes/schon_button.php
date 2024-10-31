<?php

$atts = shortcode_atts(
	array(
		'text' => 'Text',
		'link' => '#',
		'style' => 'btn-default',
		'size' => '',
		'display' => '',
		'icon' => '',

		'el_class' => '',
	),
	$atts,
	'schon_button'
);


$css_class = '';
$css_class .= ' ' . $atts['el_class'];

$css_class .= ' ' . $atts['style'];
$css_class .= ' ' . $atts['size'];
$css_class .= ' ' . $atts['display'];

$icon = (!empty($atts['icon'] )) ? '<i class="'.$atts['icon'].'"></i>': '';
echo '<a href="'.$atts['link'] .'" class="btn '.esc_attr($css_class) .'">'.$atts['text'].' '. $icon .'</a>';
?>
