<?php
// Attributes
$atts = shortcode_atts(
	array(
		'title' => '',
		'subtitle' => '',

		'el_class' => '',
	),
	$atts,
	'schon_title'
);

$css_class = '';
$css_class .= ' ' . $atts['el_class'];
?>

<div class="schon-title-wrap <?php echo esc_attr($css_class) ?>" >
	<h2 class="schon-title-title"><?php echo $atts['title']; ?></h2>

	<?php if(!empty($atts['subtitle'])): ?>
	<h5 class="schon-title-subtitle"><?php echo $atts['subtitle']; ?></h5>
	<?php endif; ?>

</div>