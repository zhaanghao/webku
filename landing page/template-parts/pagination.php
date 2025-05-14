<?php if(get_theme_mod('fast_food_delivery_show_pagination', true )== true): ?>
	<?php
		the_posts_pagination( array(
			'prev_text' => esc_html__( 'Previous page', 'fast-food-delivery' ),
			'next_text' => esc_html__( 'Next page', 'fast-food-delivery' ),
		) );
	?>		
<?php endif; ?>