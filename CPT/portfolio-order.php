<?php
// -------------- Portfolio Drag & Drop

add_action( 'admin_menu', 'crosstec_register_portfolio_menu' );

function crosstec_portfolio_order_page() {
?>
<script>
jQuery(function($) {

	$('#sortable-table tbody').sortable({
		axis: 'y',
		handle: '.column-order img',
		placeholder: 'ui-state-highlight',
		forcePlaceholderSize: true,
		update: function(event, ui) {
			var theOrder = $(this).sortable('toArray');

			var data = {
				action: 'crosstec_update_post_order',
				postType: $(this).attr('data-post-type'),
				order: theOrder
			};

			$.post(ajaxurl, data);
		}
	}).disableSelection();

});

</script>
	<div class="wrap">
		<h2>Sort portfolio</h2>
		<p>Simply drag the portfolio up or down and they will be saved in that order.</p>
	<?php $portfolio = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order' ) ); ?>
	<?php if( $portfolio->have_posts() ) : ?>

		<table class="wp-list-table widefat fixed posts" id="sortable-table">
			<thead>
				<tr>
					<th class="column-order">Order</th>
					<th class="column-thumbnail">Thumbnail</th>
					<th class="column-title">Title</th>
				</tr>
			</thead>
			<tbody data-post-type="portfolio">
			<?php while( $portfolio->have_posts() ) : $portfolio->the_post(); ?>
				<tr id="post-<?php the_ID(); ?>">
					<td class="column-order"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/css/images/move_icon.jpg'; ?>" title="" alt="Move Icon" width="30" height="30" class="" /></td>
					<td class="column-thumbnail"><?php the_post_thumbnail( 'thumbnail' ); ?></td>
					<td class="column-title"><strong><?php the_title(); ?></strong><div class="excerpt"><?php the_excerpt(); ?></div></td>
				</tr>
			<?php endwhile; ?>
			</tbody>
			<tfoot>
				<tr>
					<th class="column-order">Order</th>
					<th class="column-thumbnail">Thumbnail</th>
					<th class="column-title">Title</th>
				</tr>
			</tfoot>

		</table>

	<?php else: ?>

		<p>No portfolio found, why not <a href="post-new.php?post_type=portfolio">create one?</a></p>

	<?php endif; ?>
	<?php wp_reset_postdata(); // Don't forget to reset again! ?>

	<style>
		#sortable-table td { background: white; }
		#sortable-table .column-order { padding: 3px 10px; width: 50px; }
			#sortable-table .column-order img { cursor: move; }
		#sortable-table td.column-order { vertical-align: middle; text-align: center; }
		#sortable-table .column-thumbnail { width: 160px; }
	</style>

	</div><!-- .wrap -->

<?php

}


function crosstec_register_portfolio_menu() {

    add_submenu_page(

        'edit.php?post_type=portfolio',

        'Order portfolio',

        'Order',

        'edit_pages', 'portfolio-order',

        'crosstec_portfolio_order_page'

    );
}



function crosstec_admin_enqueue_order() {
	wp_enqueue_script( 'jquery-ui-sortable' );
}

add_action( 'admin_enqueue_scripts', 'crosstec_admin_enqueue_order' );
add_action( 'wp_ajax_crosstec_update_post_order', 'crosstec_update_portfolio_order' );

function crosstec_update_portfolio_order() {
	global $wpdb;

	$post_type     = $_POST['postType'];
	$order        = $_POST['order'];

	/**
	*    Expect: $sorted = array(
	*                menu_order => post-XX
	*            );
	*/
	foreach( $order as $menu_order => $post_id )
	{
		$post_id         = intval( str_ireplace( 'post-', '', $post_id ) );
		$menu_order     = intval($menu_order);
		wp_update_post( array( 'ID' => $post_id, 'menu_order' => $menu_order ) );
	}

	die( '1' );
}