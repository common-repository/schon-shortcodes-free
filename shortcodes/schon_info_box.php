<?php

$atts = shortcode_atts(
	array(
		'icon' => '',
		'title' => '',
		'subtitle' => '',
		'layout' => 'horizontal',

		'el_class' => '',
	),
	$atts,
	'schon_info_box'
);

?>

<div class="schon-featured-info <?php echo esc_attr($atts['el_class']) . ' ' . esc_attr($atts['layout']) ?>">
	<div class="schon-featured-info-icon-wrap">
		<i class="fa <?php echo esc_attr($atts['icon']) ?>" aria-hidden="true"></i>
	</div>
	<div class="schon-featured-info-details">
		<p class="schon-featured-info-title"> <?php echo $atts['title'] ?></p>
		<div class="schon-featured-info-subtitle"><?php echo $atts['subtitle'] ?></div>
	</div>
</div>
