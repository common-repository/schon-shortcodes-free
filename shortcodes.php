<?php

add_shortcode( 'schon_info_box', 'add_shortcode_schon_info_box' );
add_shortcode( 'schon_button', 'add_shortcode_schon_button' );
add_shortcode( 'schon_title', 'add_shortcode_schon_title' );
add_shortcode( 'schon_team_member', 'add_shortcode_schon_team_member' );


if(!function_exists('add_shortcode_schon_social_icons')) {
	
	// [schon_social_icons]
	function add_shortcode_schon_social_icons() {
		$return = '';
		$return .= '<div class="list-social-icons">';
		$return .= schon_show_social_icons(false);
		$return .= '</div>';

		return $return;
	}
}
add_shortcode( 'schon_social_icons', 'add_shortcode_schon_social_icons' );

if(!function_exists('add_shortcode_schon_loggedinout_menu')) {

	// [schon_loggedinout_menu]
	function add_shortcode_schon_loggedinout_menu() {
		$menu = '';
		if(is_user_logged_in()) {
			if(has_nav_menu( 'actionbar-loggedin' ))
				$menu = wp_nav_menu( array( 'theme_location' => 'actionbar-loggedin', 'menu_id' => 'actionbar-menu', 'menu_class' => "nav navbar-nav", "container" => "", 'echo' => false) );
		} else {
			if(has_nav_menu( 'actionbar-loggedout' ))
				$menu = wp_nav_menu( array( 'theme_location' => 'actionbar-loggedout', 'menu_id' => 'actionbar-menu', 'menu_class' => "nav navbar-nav", "container" => "", 'echo' => false) );
		}

		return $menu;
	}
}
add_shortcode( 'schon_loggedinout_menu', 'add_shortcode_schon_loggedinout_menu' );


if(!function_exists('add_shortcode_schon_widget_title')) {
	// [schon_widget_title]
	function add_shortcode_schon_widget_title( $atts, $content = null ) {

		// Attributes
		$atts = shortcode_atts(
			array(
				'class' => '',
			),
			$atts,
			'schon_widget_title'
		);

		return '<p class="h3 widget-title ' . $atts['class'] . '">'.$content.'<p>';

	}
}
add_shortcode( 'schon_widget_title', 'add_shortcode_schon_widget_title' );


if(!function_exists('add_shortcode_schon_search_box')) {

	// [schon_search_box]
	function add_shortcode_schon_search_box() {

		$taxonomy     = 'product_cat';
		$orderby      = 'name';
		$show_count   = 0;      // 1 for yes, 0 for no
		$pad_counts   = 0;      // 1 for yes, 0 for no
		$hierarchical = 1;      // 1 for yes, 0 for no
		$title        = '';
		$empty        = 0;

		$args = array(
			'taxonomy'     => $taxonomy,
			'orderby'      => $orderby,
			'show_count'   => $show_count,
			'pad_counts'   => $pad_counts,
			'hierarchical' => $hierarchical,
			'title_li'     => $title,
			'hide_empty'   => $empty
		);
		$all_categories = get_categories( $args );
		$selected_category = ( isset($_GET['product_cat']) && is_string($_GET['product_cat'])) ? $_GET['product_cat'] : '';

		//schon_print($all_categories);

		ob_start();
		?>
		<form role="search" method="get" class="woocommerce-product-search search-form form-inline" action="<?php echo esc_url(home_url( '/' )); ?>">
			<div class="form-group">
				<label class="screen-reader-text" for="woocommerce-product-search-field"><?php _e( 'Search for:', 'schon-free' ); ?></label>
				<label class="screen-reader-text" for="woocommerce-product-search-categories-filter"><?php _e( 'Filter by Categories:', 'schon-free' ); ?></label>
<!--				<input type="search" class="search-field form-control" autocomplete="off" placeholder="--><?php //esc_html_e('Search', 'schon-free'); ?><!--" value="" name="s" title="--><?php //esc_html_e('Search', 'schon-free'); ?><!--" />-->
				<div class="input-group">

					<select id="woocommerce-product-search-categories-filter" class="form-control woocommerce-product-search-categories-filter" name="product_cat">
						<option value="" selected><?php esc_html_e( 'All categories', 'schon-free'); ?></option>

						<?php
						foreach($all_categories as $term) {
							echo '<option value="'.$term->slug.'" '.selected($selected_category, $term->slug).'>' . $term->name. '</option>';
						}
						?>

					</select>
				<input type="search"
					       id="woocommerce-product-search-field"
					       autocomplete="off"
					       class="search-field"
					       placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'schon-free' ); ?>"
					       value="<?php echo get_search_query(); ?>"
					       name="s"
					       title="<?php echo esc_attr_x( 'Search for:', 'label', 'schon-free' ); ?>"
					/>
<!--				<span class="input-group-btn">-->
				</div>
				<button type="submit" class="submit-field btn btn-default">
					<i class="fa fa-search"></i>
				</button>
<!--				</span>-->
			</div>
			<input type="hidden" name="post_type" value="product" />
		</form>

		<?php
		return ob_get_clean();
	}
}
add_shortcode( 'schon_search_box', 'add_shortcode_schon_search_box' );


if(!function_exists('schon_widget_title_markup')) {
	/**
	 * Allow to align to right ti title of the widgets
	 *
	 * @param $title
	 *
	 * @return mixed
	 */
	function schon_widget_title_markup( $title ) {

		$title = str_replace( '[text-right]', '<span class="text-right">', $title );
		$title = str_replace( '[/text-right]', '</span>', $title );

		return $title;
	}
}
add_filter( 'widget_title', 'schon_widget_title_markup' );


/* Visual Composer*/

// [schon_info_box]
if(!function_exists('add_shortcode_schon_info_box')) {
	function add_shortcode_schon_info_box( $atts, $content = null ) {

		ob_start();

		include plugin_dir_path( __FILE__ ) . "/shortcodes/schon_info_box.php";

		return ob_get_clean();

	}
}

// [schon_button]
if(!function_exists('add_shortcode_schon_button')) {
	function add_shortcode_schon_button( $atts, $content = null ) {

		ob_start();

		include plugin_dir_path( __FILE__ ) . "/shortcodes/schon_button.php";

		return ob_get_clean();

	}
}


// [schon_title]
if(!function_exists('add_shortcode_schon_title')) {
	function add_shortcode_schon_title( $atts, $content = null ) {

		ob_start();

		include plugin_dir_path( __FILE__ ) . "/shortcodes/schon_title.php";

		return ob_get_clean();

	}
}